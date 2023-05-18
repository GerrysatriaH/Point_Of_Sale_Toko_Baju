<?php

namespace App\Controllers;

class Supplier extends BaseController{
    protected $data;

    public function index(){

        $this->data['title'] = "Daftar Suplier Baju";
        return view('supplier/index', $this->data);
    }

    public function create(){

        $this->data['title'] = "Tambah Data Supplier";
        return view('supplier/create', $this->data);
    }

    public function edit(){

        $this->data['title'] = "Ubah Data Supplier";
        return view('supplier/edit',$this->data);
    }
}