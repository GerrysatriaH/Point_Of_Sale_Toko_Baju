<?php 

namespace App\Controllers;

use App\Models\ProdukModel;
use App\Models\PelangganModel;
use App\Models\PembelianModel;

class Pembayaran extends BaseController{

    protected $data;
    protected $dataArray;

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
        $this->data['pembelian'] = $this->buying_model->select('*, (produk.harga * jumlah) As Total')->join('produk', 'produk.id = pembelian.product_id')
                                                      ->join('pelanggan', 'pelanggan.id = pembelian.customer_id')
                                                      ->get()->getResult();

        return view('pembayaran/index', $this->data);
    }

    public function addProduk(){

        $this->data['request'] = $this->request;

        $id_product     = $this->request->getVar('produk');
        $id_pelanggan   = $this->request->getVar('pelanggan');
        $jumlah         = $this->request->getVar('jumlah');

        $post = [
            'product_id'    => $id_product,
            'customer_id'   => $id_pelanggan,
            'jumlah'        => $jumlah
        ];

        $this->buying_model->insert($post);
        return redirect()->to('pembayaran')->withInput();
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
}