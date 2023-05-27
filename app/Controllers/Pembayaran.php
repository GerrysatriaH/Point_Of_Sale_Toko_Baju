<?php 

namespace App\Controllers;

use App\Models\ProdukModel;
use App\Models\PelangganModel;

class Pembayaran extends BaseController{

    protected $data;
    protected $product_model;
    protected $customer_model;

    public function __construct(){

        $this->product_model = New ProdukModel();
        $this->customer_model = New PelangganModel();
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

        $this->data['produk'] = $this->product_model->select('*')->get()->getResult();
        $this->data['pelanggan'] = $this->customer_model->orderBy('id ASC')->select('*')->get()->getResult();

        return view('pembayaran/index', $this->data);
    }
}