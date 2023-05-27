<?php 

namespace App\Controllers;

use App\Models\UsersModel;
use App\Models\RolesModel;

class Transaksi extends BaseController{

    protected $data;

    protected $transaction_model;

    // public function __construct() {

    //     $this->Transa_model = New SupplierModel();
    // }

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

        // $this->data['supplier'] = $this->supplier_model->orderBy('id ASC')->select('*')->get()->getResult();
        return view('transaksi/index', $this->data);
    }
}