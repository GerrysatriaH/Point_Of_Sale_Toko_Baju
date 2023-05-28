<?php 

namespace App\Controllers;

use App\Models\ProdukModel;
use App\Models\PelangganModel;
use App\Models\PembelianModel;

class Pembayaran extends BaseController{

    protected $data;

    protected $product_model;
    protected $customer_model;
    protected $buying_model;

    public function __construct(){

        $this->product_model = New ProdukModel();
        $this->customer_model = New PelangganModel();
        $this->buying_model = New PembelianModel();
    }

    public function index(){

        $this->data['title'] = "Pembayaran";
        $this->data['breadcrumbs'] = array(
            array(
                'title' => 'Dashboard',
                'url' => base_url()
            ),
            array(
                'title' => 'Pembayaran'
            )
        );

        $this->data['produk']    = $this->product_model->select('id, nama_produk, kode_produk')->get()->getResult();
        $this->data['pelanggan'] = $this->customer_model->orderBy('id ASC')->select('*')->get()->getResult();
        $this->data['pembelian'] = $this->buying_model->select('*, (produk.harga * jumlah) As Total')
                                                        ->join('produk', 'produk.id = pembelian.product_id')
                                                        ->join('pelanggan', 'pelanggan.id = pembelian.customer_id')
                                                        ->get()->getResult();

        $this->data['total'] = 0;
        foreach ($this->data['pembelian'] as $buy) {
            $this->data['total'] += $buy->Total;
        }

        return view('pembayaran/index', $this->data);
    }

    public function addProduk(){

        $id_product     = $this->request->getVar('produk');
        $id_pelanggan   = $this->request->getVar('pelanggan');
        $jumlah         = $this->request->getVar('jumlah');

        $post = [
            'product_id'    => $id_product,
            'customer_id'   => $id_pelanggan,
            'jumlah'        => $jumlah
        ];

        if($this->buying_model->select('*')->countAll() > 0){
            if($this->buying_model->select('*')->where(['product_id'=>$post['product_id']])->first()){
                return redirect()->to('pembayaran')->with('error', 'Produk telah dipilih');
            } else if(!$this->buying_model->select('*')->where(['customer_id'=>$post['customer_id']])->first()) {
                return redirect()->to('pembayaran')->with('error', 'Tipe pelanggan berubah');
            }
        }

        $this->buying_model->insert($post);
        return redirect()->to('pembayaran')->withInput()->with('success', 'produk berhasil ditambahkan');
    }

    public function delete_pembelian($id=''){
        if(empty($id)){
            return redirect()->to('pembayaran')->with('error', 'Gagal Menghapus Data');
        }
        $delete = $this->buying_model->Where(['product_id' => $id])->delete();
        if($delete){
            return redirect()->to('pembayaran')->with('success', 'Berhasil Menghapus Data');
        }
    }

    public function emptyTable(){
        $this->buying_model->emptyTable();
        return redirect()->to('pembayaran')->with('success','Data berhasil di reset');
    }

    // public function getDataTransaksi(){
    //     return view('pembayaran/invoice_template');
    // }

    public function invoice(){
        $this->data['sub_total'] = $this->request->getVar('sub_total');
        $this->data['diskon'] = $this->request->getVar('diskon');
        $this->data['total_akhir'] = $this->request->getVar('total_akhir');
        $this->data['tunai'] = $this->request->getVar('tunai');
        $this->data['kembalian'] = $this->request->getVar('kembalian');

        $this->data['pembelian'] = $this->buying_model->select('*, (produk.harga * jumlah) As Total')
                                                        ->join('produk', 'produk.id = pembelian.product_id')
                                                        ->join('pelanggan', 'pelanggan.id = pembelian.customer_id')
                                                        ->get()->getResult();

        return view('pembayaran/invoice_template', $this->data);
    }
}