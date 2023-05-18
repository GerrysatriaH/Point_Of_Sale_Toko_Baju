<?php

namespace App\Controllers;

class Pelanggan extends BaseController{
    protected $data;

    public function index(){

        $data['title'] = "Daftar list Pelanggan";
        return view('pelanggan/index', $this->data);
    }

    public function create(){

        $data['title'] = "Tambah Data Pelanggan";
        return view('pelanggan/create', $this->data);
    }

    public function edit(){

        $data['title'] = "Ubah Data Pelanggan";
        return view('pelanggan/edit', $this->data);
    }
}