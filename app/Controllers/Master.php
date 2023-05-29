<?php

namespace App\Controllers;

use App\Models\KategoriModel;
use App\Models\UkuranModel;
use App\Models\ProdukModel;
use App\Models\SupplierModel;

class Master extends BaseController{

    protected $data;

    protected $category_model;
    protected $size_model;
    protected $product_model;
    protected $supplier_model;

    public function __construct() {

        $this->category_model = New KategoriModel();
        $this->size_model = New UkuranModel();
        $this->product_model = New ProdukModel();
        $this->supplier_model = New SupplierModel();
    }
    
    //-------------------------------------------- Kategori Baju -----------------------------------------------------//

    public function kategori(){
        $this->data['title'] = 'Kategori Produk';
        $this->data['breadcrumbs'] = array(
            array(
                'title' => 'Dashboard',
                'url' => base_url()
            ),
            array(
                'title' => 'Kategori Produk'
            )
        );

        $this->data['kategori'] = $this->category_model->orderBy('id ASC')->select('*')->get()->getResult();
        return view('master/kategori/index', $this->data);
    }

    public function edit_kategori($id=''){
        $this->data['title'] = 'Ubah Kategori Produk';
        $this->data['breadcrumbs'] = array(
            array(
                'title' => 'Dashboard',
                'url' => base_url()
            ),
            array(
                'title' => 'Kategori Produk',
                'url' => base_url('master/kategori')
            ),
            array(
                'title' => 'Ubah Kategori Produk'
            )
        );

        if(empty($id)){
            return redirect()->to('master/kategori')->with('error', 'Data Tidak Ditemukan');
        }
        $this->data['data'] = $this->category_model->select('*')->where(['id'=>$id])->first();
        return view('master/kategori/edit', $this->data);
    }

    public function create_kategori(){
        $data = [
            'kategori' => $this->request->getVar('kategori')
        ];

        if($this->category_model->where(['kategori' => $data['kategori']])->first()){
            return redirect()->back()->withInput()->with('error', 'Kategori telah ada');
        } 

        $this->category_model->insert($data);
        return redirect()->to('master/kategori')->with('success', 'Berhasil Menambahkan Data');
    }

    public function update_kategori($id=''){
        $data = [
            'kategori' => $this->request->getVar('kategori')
        ];

        if($this->category_model->where(['kategori' => $data['kategori']])->first()){
            return redirect()->back()->withInput()->with('error', 'Kategori telah ada');
        } 
        $this->category_model->where(['id'=>$id])->set($data)->update();
        return redirect()->to('master/kategori')->with('success', 'Berhasil Memperbaharui Data');
    }

    public function delete_kategori($id=''){
        if(empty($id)){
            return redirect()->to('master/kategori')->with('error', 'Gagal Menghapus Data');
        }
        $delete = $this->category_model->delete($id);
        if($delete){
            return redirect()->to('master/kategori')->with('success', 'Berhasil Menghapus Data');
        }
    }

    //-------------------------------------------- Ukuran Baju -----------------------------------------------------//

    public function ukuran(){
        $this->data['title'] = 'Ukuran Baju';
        $this->data['breadcrumbs'] = array(
            array(
                'title' => 'Dashboard',
                'url' => base_url()
            ),
            array(
                'title' => 'Ukuran Baju'
            )
        );

        $this->data['ukuran'] = $this->size_model->orderBy('id ASC')->select('*')->get()->getResult();
        return view('master/ukuran/index', $this->data);
    }

    public function edit_ukuran($id=''){
        $this->data['title'] = 'Ubah Ukuran Produk';
        $this->data['breadcrumbs'] = array(
            array(
                'title' => 'Dashboard',
                'url' => base_url()
            ),
            array(
                'title' => 'Ukuran Produk',
                'url' => base_url('master/ukuran')
            ),
            array(
                'title' => 'Ubah Ukuran Produk'
            )
        );

        if(empty($id)){
            return redirect()->to('master/ukuran')->with('error', 'Data Tidak Ditemukan');
        }
        $this->data['data'] = $this->size_model->select('*')->where(['id'=>$id])->first();
        return view('master/ukuran/edit', $this->data);
    }

    public function create_ukuran(){
        $data = [
            'ukuran' => $this->request->getVar('ukuran')
        ];

        if($this->size_model->where(['ukuran' => $data['ukuran']])->first()){
            return redirect()->back()->withInput()->with('error', 'ukuran telah ada');
        } 

        $this->size_model->insert($data);
        return redirect()->to('master/ukuran')->with('success', 'Berhasil Menambahkan Data');
    }

    public function update_ukuran($id=''){
        $data = [
            'ukuran' => $this->request->getVar('ukuran')
        ];

        if($this->size_model->where(['ukuran' => $data['ukuran']])->first()){
            return redirect()->back()->withInput()->with('error', 'ukuran telah ada');
        } 
        $this->size_model->where(['id'=>$id])->set($data)->update();
        return redirect()->to('master/ukuran')->with('success', 'Berhasil Memperbaharui Data');
    }

    public function delete_ukuran($id=''){
        if(empty($id)){
            return redirect()->to('master/ukuran')->with('error', 'Gagal Menghapus Data');
        }
        $delete = $this->size_model->delete($id);
        if($delete){
            return redirect()->to('master/ukuran')->with('success', 'Berhasil Menghapus Data');
        }
    }

    //-------------------------------------------- Produk Baju -----------------------------------------------------//

    public function produk(){
        $this->data['title'] = 'Produk';
        $this->data['breadcrumbs'] = array(
            array(
                'title' => 'Dashboard',
                'url' => base_url()
            ),
            array(
                'title' => 'Produk'
            )
        );

        $this->data['produk'] = $this->product_model
                                ->orderBy('id ASC')
                                ->select('produk.id, produk.kode_produk, 
                                          produk.nama_produk, kategori.kategori, 
                                          produk.harga, produk.stok')
                                ->join('kategori', 'kategori.id = produk.id_kategori')
                                ->get()->getResult();

        return view('master/produk/index', $this->data);
    }

    public function create_produk(){
        $this->data['title'] = 'Tambah Data Produk';
        $this->data['breadcrumbs'] = array(
            array(
                'title' => 'Dashboard',
                'url' => base_url()
            ),
            array(
                'title' => 'Produk',
                'url'   => base_url('master/produk')
            ),
            array(
                'title' => 'Tambah Data Produk'
            )
        );

        $this->data['kategori'] = $this->category_model->orderBy('id ASC')->select('*')->get()->getResult();
        $this->data['ukuran'] = $this->size_model->orderBy('id ASC')->select('*')->get()->getResult();
        $this->data['supplier'] = $this->supplier_model->orderBy('id ASC')->select('*')->get()->getResult();

        return view('master/produk/create', $this->data);
    }

    // in dev
    public function read_produk(){
        $this->data['title'] = 'Detail Produk';
        $this->data['breadcrumbs'] = array(
            array(
                'title' => 'Dashboard',
                'url' => base_url()
            ),
            array(
                'title' => 'Produk',
                'url'   => base_url('master/produk')
            ),
            array(
                'title' => 'Detail Produk'
            )
        );
    }

    public function update_produk($id=''){
        $this->data['title'] = 'Ubah Data Produk';
        $this->data['breadcrumbs'] = array(
            array(
                'title' => 'Dashboard',
                'url' => base_url()
            ),
            array(
                'title' => 'Produk',
                'url'   => base_url('master/produk')
            ),
            array(
                'title' => 'Ubah Data Produk'
            )
        );

        if(empty($id)){
            return redirect()->to('master/produk')->with('error', 'Data Tidak Ditemukan');
        }
        
        $this->data['kategori'] = $this->category_model->orderBy('id ASC')->select('*')->get()->getResult();
        $this->data['ukuran'] = $this->size_model->orderBy('id ASC')->select('*')->get()->getResult();
        $this->data['supplier'] = $this->supplier_model->orderBy('id ASC')->select('*')->get()->getResult();
        $this->data['data'] = $this->product_model->select('*')->where(['id'=>$id])->first();

        return view('master/produk/edit', $this->data);
    }

    public function submit_changes_produk(){
        $this->data['request'] = $this->request;
        $data = [
            'kode_produk' => $this->request->getPost('kode_produk'),
            'nama_produk' => $this->request->getPost('nama_produk'),
            'id_kategori' => $this->request->getPost('kategori'),
            'id_ukuran'   => $this->request->getPost('ukuran'),
            'id_supplier' => $this->request->getPost('supplier'),
            'harga' => $this->request->getPost('harga'),
            'stok'  => $this->request->getPost('stok'),
        ];

        if(!empty($this->request->getPost('id'))) {
            $save = $this->product_model->where(['id'=>$this->request->getPost('id')])->set($data)->update();
        } else {
            $save = $this->product_model->insert($data);
        }
        
        if($save){
            return redirect()->to('master/produk')->with('success', 'Berhasil Memperbaharui Data');
        } else {
            return redirect()->to('master/produk')->with('success', 'Berhasil Menambahkan Data');
        }
    }

    public function delete_produk($id=''){
        if(empty($id)){
            return redirect()->to('master/produk')->with('error', 'Gagal Menghapus Data');
        }
        $delete = $this->product_model->delete($id);
        if($delete){
            return redirect()->to('master/produk')->with('success', 'Berhasil Menghapus Data');
        }
    }
}