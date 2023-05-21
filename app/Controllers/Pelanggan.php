<?php

namespace App\Controllers;

class Pelanggan extends BaseController{
    protected $data;

    public function index(){

        $this->data['title'] = "Daftar List Pelanggan";
        $this->data['breadcrumbs'] = array(
            array(
                'title' => 'Dashboard',
                'url' => base_url()
            ),
            array(
                'title' => 'Pelanggan'
            )
        );

        return view('pelanggan/index', $this->data);
    }

    public function create(){

        $this->data['title'] = "Tambah Data Pelanggan";
        $this->data['breadcrumbs'] = array(
            array(
                'title' => 'Dashboard',
                'url' => base_url()
            ),
            array(
                'title' => 'Pelanggan',
                'url' => base_url('pelanggan')
            ),
            array(
                'title' => 'Create Data'
            )
        );

        return view('pelanggan/create', $this->data);
    }

    public function edit(){

        $this->data['title'] = "Ubah Data Pelanggan";
        $$this->data['breadcrumbs'] = array(
            array(
                'title' => 'Dashboard',
                'url' => base_url()
            ),
            array(
                'title' => 'Pelanggan',
                'url' => base_url('pelanggan')
            ),
            array(
                'title' => 'Edit Data'
            )
        );

        return view('pelanggan/edit', $this->data);
    }
}