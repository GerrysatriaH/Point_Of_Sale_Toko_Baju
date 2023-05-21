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
        $this->data['title'] = 'Kategori Baju';
        $this->data['breadcrumbs'] = array(
            array(
                'title' => 'Dashboard',
                'url' => base_url()
            ),
            array(
                'title' => 'Kategori Baju'
            )
        );

        $this->data['kategori'] = $this->category_model->orderBy('id ASC')->select('*')->get()->getResult();

        return view('master/kategori/index', $this->data);
    }

    public function create_kategori(){
        $this->data['title'] = 'Tambah Kategori Baju';
        $this->data['breadcrumbs'] = array(
            array(
                'title' => 'Dashboard',
                'url' => base_url()
            ),
            array(
                'title' => 'Tambah Kategori Baju'
            )
        );
        return view('master/kategori/create', $this->data);
    }

    public function update_kategori($id=''){
        $this->data['title'] = 'Kategori Baju';
        $this->data['breadcrumbs'] = array(
            array(
                'title' => 'Dashboard',
                'url' => base_url()
            ),
            array(
                'title' => 'Kategori Baju'
            )
        );

        if(empty($id)){
            return redirect()->to('/main/kategori');
        }
        $this->data['data'] = $this->category_model->select('*')->where(['id'=>$id])->first();
        return view('master/kategori/edit', $this->data);
    }

    public function submit_changes_kategori(){
        $this->data['request'] = $this->request;
        $post = [
            'kategori' => $this->request->getPost('kategori')
        ];
        if(!empty($this->request->getPost('id')))
            $save = $this->category_model->where(['id'=>$this->request->getPost('id')])->set($post)->update();
        else
            $save = $this->category_model->insert($post);
        if($save){
            return redirect()->to('/master/kategori');
        } else {
            return redirect()->to('/master/kategori');
        }
    }

    public function delete_kategori($id=''){
        if(empty($id)){
            return redirect()->to('/master/kategori');
        }
        $delete = $this->category_model->delete($id);
        if($delete){
            return redirect()->to('/master/kategori');
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

        $this->data['ukuran'] = $this->size_model->orderBy('id ASC')->select('*')->get()->getResult()->pagina;

        return view('master/ukuran/index', $this->data);
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