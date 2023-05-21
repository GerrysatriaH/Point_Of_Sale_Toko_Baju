<?php

namespace App\Controllers;

class Supplier extends BaseController{
    protected $data;

    public function index(){

        $this->data['title'] = "Daftar Suplier Baju";
        $this->data['breadcrumbs'] = array(
            array(
                'title' => 'Dashboard',
                'url' => base_url()
            ),
            array(
                'title' => 'Supplier'
            )
        );

        return view('supplier/index', $this->data);
    }

    public function create(){

        $this->data['title'] = "Tambah Data Supplier";
        $this->data['breadcrumbs'] = array(
            array(
                'title' => 'Dashboard',
                'url' => base_url()
            ),
            array(
                'title' => 'Supplier',
                'url' => base_url('supplier')
            ),
            array(
                'title' => 'Create Data'
            )
        );

        return view('supplier/create', $this->data);
    }

    public function edit(){

        $this->data['title'] = "Ubah Data Supplier";
        $this->data['breadcrumbs'] = array(
            array(
                'title' => 'Dashboard',
                'url' => base_url()
            ),
            array(
                'title' => 'Supplier',
                'url' => base_url('supplier')
            ),
            array(
                'title' => 'Edit Data'
            )
        );

        return view('supplier/edit',$this->data);
    }
}