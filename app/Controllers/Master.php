<?php

namespace App\Controllers;

class Master extends BaseController{
    protected $data;
    
    public function kategori(){
        $this->data['title'] = 'Kategori Baju';
        return view('kategori/index', $this->data);
    }

    public function ukuran(){
        $this->data['title'] = 'Ukuran Baju';
        return view('ukuran/index', $this->data);
    }

    public function produk(){
        $this->data['title'] = 'Produk Baju';
        return view('produk/index', $this->data);
    }
}