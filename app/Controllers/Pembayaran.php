<?php 

namespace App\Controllers;

use App\Models\ProdukModel;
use App\Models\PelangganModel;
use App\Models\PembelianModel;
use App\Models\TransaksiModel;
use App\Models\DetailTransaksiModel;

class Pembayaran extends BaseController{

    protected $data;

    protected $product_model;
    protected $customer_model;
    protected $buying_model;
    protected $transaksi_model;
    protected $detail_transac_model;

    public function __construct(){

        $this->product_model = New ProdukModel();
        $this->customer_model = New PelangganModel();
        $this->buying_model = New PembelianModel();
        $this->transaksi_model = New TransaksiModel();
        $this->detail_transac_model = New DetailTransaksiModel();
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

        $this->data['produk']    = $this->product_model->select('id, nama_produk, kode_produk, stok')->where('stok >', 0)->get()->getResult();
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
        $delete = $this->buying_model->where(['product_id' => $id])->delete();
        if($delete){
            return redirect()->to('pembayaran')->with('success', 'Berhasil Menghapus Data');
        }
    }

    public function emptyTable(){
        $this->buying_model->emptyTable();
        return redirect()->to('pembayaran')->with('success','Data berhasil di reset');
    }

    public function invoice(){

        $this->data['sub_total']    = $this->request->getVar('sub_total');
        $this->data['diskon']       = $this->request->getVar('diskon');
        $this->data['total_akhir']  = $this->request->getVar('total_akhir');
        $this->data['tunai']        = $this->request->getVar('tunai');
        $this->data['kembalian']    = $this->request->getVar('kembalian');

        $this->data['pembelian']    = $this->buying_model->select('*, (produk.harga * jumlah) As Total')
                                                         ->join('produk', 'produk.id = pembelian.product_id')
                                                         ->join('pelanggan', 'pelanggan.id = pembelian.customer_id')
                                                         ->get()->getResult();
        foreach ($this->data['pembelian'] as $buy){
            $this->product_model->set('stok', 'stok-'.$buy->jumlah, false)->where('id', $buy->product_id)->update();
        }

        $data_transac = [
            'tanggal_transaksi' => $this->request->getVar('tanggal'),
            'nama_kasir'    => $this->request->getVar('user'),
            'sub_total'     => $this->data['sub_total'],
            'diskon'        => $this->data['diskon'], 
            'total_akhir'   => $this->data['total_akhir'],
            'tunai'         => $this->data['tunai'],
            'kembalian'     => $this->data['tunai'] - $this->data['total_akhir']
        ];

        $save_transac = $this->transaksi_model->insert($data_transac);

        if($save_transac){
            $transaction_id = $this->transaksi_model->insertID();
            $items = $this->buying_model->getDataItem();
            foreach ($items as $item) {
                $data_detail_transac = [
                    'id_transaksi' => $transaction_id,
                    'nama_produk' => $item->nama_produk,
                    'jumlah' => $item->jumlah,
                    'harga' => $item->harga,
                    'total_harga' => $item->total
                ];
                $this->detail_transac_model->insert($data_detail_transac);
            }
        }

        $this->buying_model->emptyTable();

        return view('pembayaran/invoice_template', $this->data);
    }
}