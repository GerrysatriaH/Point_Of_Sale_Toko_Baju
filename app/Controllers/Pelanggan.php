<?php

namespace App\Controllers;

use App\Models\PelangganModel;

class Pelanggan extends BaseController{

    protected $data;

    protected $customer_model;

    public function __construct() {

        $this->customer_model = New PelangganModel();
    }

    public function index(){

        $this->data['title'] = "Pelanggan";
        $this->data['breadcrumbs'] = array(
            array(
                'title' => 'Dashboard',
                'url' => base_url()
            ),
            array(
                'title' => 'Pelanggan'
            )
        );

        $this->data['pelanggan'] = $this->customer_model->orderBy('id ASC')->select('*')->get()->getResult();
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
                'title' => 'Tambah Data Pelanggan'
            )
        );

        return view('pelanggan/create', $this->data);
    }

    public function update($id = ''){

        $this->data['title'] = "Ubah Data Pelanggan";
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
                'title' => 'Ubah Data Pelanggan'
            )
        );

        if(empty($id)){
            return redirect()->to('pelanggan');
        }
        $this->data['data'] = $this->customer_model->select('*')->where(['id'=>$id])->first();
        return view('pelanggan/edit', $this->data);
    }

    public function submit_changes_pelanggan(){
        $this->data['request'] = $this->request;
        $post = [
            'nama'      => $this->request->getPost('nama'),
            'gender'    => $this->request->getPost('gender'),
            'tipe'      => $this->request->getPost('tipe'),
            'no_telp'   => $this->request->getPost('no_telp'),
            'alamat'    => $this->request->getPost('alamat')
        ];

        if(!empty($this->request->getPost('id'))) {
            $save = $this->customer_model->where(['id'=>$this->request->getPost('id')])->set($post)->update();
        } else {
            $save = $this->customer_model->insert($post);
        }

        if($save){
            return redirect()->to('pelanggan');
        } else {
            return redirect()->to('pelanggan');
        }
    }

    public function delete($id=''){
        if(empty($id)){
            return redirect()->to('pelanggan');
        }
        $delete = $this->customer_model->delete($id);
        if($delete){
            return redirect()->to('pelanggan');
        }
    }
}