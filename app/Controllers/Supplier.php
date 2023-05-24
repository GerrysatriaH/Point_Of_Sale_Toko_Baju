<?php

namespace App\Controllers;

use App\Models\SupplierModel;

class Supplier extends BaseController{
    protected $data;

    protected $supplier_model;

    public function __construct() {

        $this->supplier_model = New SupplierModel();
    }

    public function index(){

        $this->data['title'] = "Supplier";
        $this->data['breadcrumbs'] = array(
            array(
                'title' => 'Dashboard',
                'url' => base_url()
            ),
            array(
                'title' => 'Supplier'
            )
        );

        $this->data['supplier'] = $this->supplier_model->orderBy('id ASC')->select('*')->get()->getResult();
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
                'title' => 'Tambah Data Supplier'
            )
        );

        return view('supplier/create', $this->data);
    }

    public function update($id = ''){

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
                'title' => 'Ubah Data Supplier'
            )
        );

        if(empty($id)){
            return redirect()->to('supplier');
        }
        $this->data['data'] = $this->supplier_model->select('*')->where(['id'=>$id])->first();
        return view('supplier/edit',$this->data);
    }

    public function submit_changes_supplier(){
        $this->data['request'] = $this->request;
        $post = [
            'nama'      => $this->request->getPost('nama'),
            'no_telp'   => $this->request->getPost('no_telp'),
            'alamat'    => $this->request->getPost('alamat')
        ];

        if(!empty($this->request->getPost('id'))) {
            $save = $this->supplier_model->where(['id'=>$this->request->getPost('id')])->set($post)->update();
        } else {
            $save = $this->supplier_model->insert($post);
        }

        if($save){
            return redirect()->to('supplier');
        } else {
            return redirect()->to('supplier');
        }
    }

    public function delete($id=''){
        if(empty($id)){
            return redirect()->to('supplier');
        }
        $delete = $this->supplier_model->delete($id);
        if($delete){
            return redirect()->to('supplier');
        }
    }
}