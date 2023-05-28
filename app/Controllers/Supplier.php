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
            return redirect()->to('supplier')->with('error', 'Data Tidak Ditemukan');
        }
        $this->data['data'] = $this->supplier_model->select('*')->where(['id'=>$id])->first();
        return view('supplier/edit',$this->data);
    }

    public function create_supplier(){
        $data = [
            'nama'      => $this->request->getVar('nama'),
            'no_telp'   => $this->request->getVar('no_telp'),
            'alamat'    => $this->request->getVar('alamat')
        ];

        if($this->supplier_model->where(['nama' => $data['nama']])->first()){
            return redirect()->back()->withInput()->with('error', 'Data supplier telah ada');
        } 

        $this->supplier_model->insert($data);
        return redirect()->to('supplier')->with('success', 'Berhasil Menambahkan Data');
    }

    public function update_supplier($id=''){
        $data = [
            'nama'      => $this->request->getVar('nama'),
            'no_telp'   => $this->request->getVar('no_telp'),
            'alamat'    => $this->request->getVar('alamat')
        ];

        if($this->supplier_model->where(['nama' => $data['nama']])->first()){
            return redirect()->back()->withInput()->with('error', 'Data supplier telah ada');
        } 
        $this->supplier_model->where(['id'=>$id])->set($data)->update();
        return redirect()->to('supplier')->with('success', 'Berhasil Memperbaharui Data');
    }

    public function delete($id=''){
        if(empty($id)){
            return redirect()->to('supplier')->with('error', 'Gagal Menghapus Data');
        }
        $delete = $this->supplier_model->delete($id);
        if($delete){
            return redirect()->to('supplier')->with('success', 'Berhasil Menghapus Data');
        }
    }
}