<?php

namespace App\Controllers;

use App\Models\ProdukModel;
use App\Models\SupplierModel;
use App\Models\UsersModel;
use App\Models\PelangganModel;

class Dashboard extends BaseController {

    protected $data;
    protected $session;

    protected $prod_model;
    protected $supp_model;
    protected $user_model;
    protected $plgn_model;

    public function __construct() {

        $this->prod_model = New ProdukModel();
        $this->supp_model = New SupplierModel();
        $this->user_model = New UsersModel();
        $this->plgn_model = New PelangganModel();

        $this->session= \Config\Services::session();
        $this->data['session'] = $this->session;
    }

    public function index() {

        $this->data['title'] = "Dashboard";
        $this->data['breadcrumbs'] = array(
            array(
                'title' => 'Dashboard'
            )
        );

        $this->data['produk'] = $this->prod_model->select('*')->countAll();
        $this->data['supplier'] = $this->supp_model->select('*')->countAll();
        $this->data['pelanggan'] = $this->plgn_model->select('*')->countAll();
        $this->data['pengguna'] = $this->user_model->select('*')->countAll();

        return view('dashboard/index', $this->data);
    }
}