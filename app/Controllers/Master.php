<?php

namespace App\Controllers;

use App\Models\KategoriModel;
use App\Models\UkuranModel;

class Master extends BaseController{

    protected $data;

    protected $category_model;
    protected $size_model;
    protected $product_model;

    public function __construct() {

        $this->category_model = New KategoriModel();
        $this->size_model = New UkuranModel();
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

    public function create_kategori(){
        $this->data['title'] = 'Tambah Kategori Produk';
        $this->data['breadcrumbs'] = array(
            array(
                'title' => 'Dashboard',
                'url' => base_url()
            ),
            array(
                'title' => 'Kategori Produk',
                'url' => base_url('kategori')
            ),
            array(
                'title' => 'Tambah Kategori Produk'
            )
        );
        return view('master/kategori/create', $this->data);
    }

    public function update_kategori($id=''){
        $this->data['title'] = 'Edit Kategori Produk';
        $this->data['breadcrumbs'] = array(
            array(
                'title' => 'Dashboard',
                'url' => base_url()
            ),
            array(
                'title' => 'Kategori Produk',
                'url' => base_url('kategori')
            ),
            array(
                'title' => 'Edit Kategori Produk'
            )
        );

        if(empty($id)){
            return redirect()->to('master/kategori');
        }
        $this->data['data'] = $this->category_model->select('*')->where(['id'=>$id])->first();
        return view('master/kategori/edit', $this->data);
    }

    public function submit_changes_kategori(){
        $this->data['request'] = $this->request;
        $post = [
            'kategori' => $this->request->getPost('kategori')
        ];
        if(!empty($this->request->getPost('id'))) {
            $save = $this->category_model->where(['id'=>$this->request->getPost('id')])->set($post)->update();
        } else {
            $save = $this->category_model->insert($post);
        }

        if($save){
            return redirect()->to('master/kategori');
        } else {
            return redirect()->to('master/kategori');
        }
    }

    public function delete_kategori($id=''){
        if(empty($id)){
            return redirect()->to('master/kategori');
        }
        $delete = $this->category_model->delete($id);
        if($delete){
            return redirect()->to('master/kategori');
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

    public function create_ukuran(){
        $this->data['title'] = 'Tambah Ukuran Produk';
        $this->data['breadcrumbs'] = array(
            array(
                'title' => 'Dashboard',
                'url' => base_url()
            ),
            array(
                'title' => 'Ukuran Produk',
                'url' => base_url('ukuran')
            ),
            array(
                'title' => 'Tambah Ukuran Produk'
            )
        );
        return view('master/ukuran/create', $this->data);
    }

    public function update_ukuran($id=''){
        $this->data['title'] = 'Edit Ukuran Produk';
        $this->data['breadcrumbs'] = array(
            array(
                'title' => 'Dashboard',
                'url' => base_url()
            ),
            array(
                'title' => 'Ukuran Produk',
                'url' => base_url('ukuran')
            ),
            array(
                'title' => 'Edit Ukuran Produk'
            )
        );

        if(empty($id)){
            return redirect()->to('master/ukuran');
        }
        $this->data['data'] = $this->size_model->select('*')->where(['id'=>$id])->first();
        return view('master/ukuran/edit', $this->data);
    }

    public function submit_changes_ukuran(){
        $this->data['request'] = $this->request;
        $post = [
            'ukuran' => $this->request->getPost('ukuran')
        ];
        if(!empty($this->request->getPost('id'))) {
            $save = $this->size_model->where(['id'=>$this->request->getPost('id')])->set($post)->update();
        } else {
            $save = $this->size_model->insert($post);
        }
        
        if($save){
            return redirect()->to('master/ukuran');
        } else {
            return redirect()->to('master/ukuran');
        }
    }

    public function delete_ukuran($id=''){
        if(empty($id)){
            return redirect()->to('master/ukuran');
        }
        $delete = $this->size_model->delete($id);
        if($delete){
            return redirect()->to('master/ukuran');
        }
    }

    //-------------------------------------------- Produk Baju -----------------------------------------------------//

    public function produk(){
        $this->data['title'] = 'Produk Baju';
        $this->data['breadcrumbs'] = array(
            array(
                'title' => 'Dashboard',
                'url' => base_url()
            ),
            array(
                'title' => 'Produk'
            )
        );

        return view('master/produk/index', $this->data);
    }
}