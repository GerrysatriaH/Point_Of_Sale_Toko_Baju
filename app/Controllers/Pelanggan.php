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

        $this->data['title'] = "Tipe Pelanggan";
        $this->data['breadcrumbs'] = array(
            array(
                'title' => 'Dashboard',
                'url' => base_url()
            ),
            array(
                'title' => 'Tipe Pelanggan'
            )
        );

        $this->data['pelanggan'] = $this->customer_model->orderBy('id ASC')->select('*')->get()->getResult();
        return view('pelanggan/index', $this->data);
    }

    public function create(){

        $this->data['title'] = "Tambah Data Tipe Pelanggan";
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
                'title' => 'Tambah Data'
            )
        );

        return view('pelanggan/create', $this->data);
    }

    public function update($id = ''){

        $this->data['title'] = "Ubah Data Tipe Pelanggan";
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
            return redirect()->to('pelanggan')->with('error', 'Data Tidak Ditemukan');
        }
        $this->data['data'] = $this->customer_model->select('*')->where(['id'=>$id])->first();
        return view('pelanggan/edit', $this->data);
    }

    public function submit_changes_pelanggan(){
        $this->data['request'] = $this->request;
        $post = [
            'tipe'      => $this->request->getPost('tipe'),
            'discount'  => $this->request->getPost('discount')
        ];

        if(!empty($this->request->getPost('id'))) {
            $save = $this->customer_model->where(['id'=>$this->request->getPost('id')])->set($post)->update();
        } else {
            $save = $this->customer_model->insert($post);
        }

        if($save){
            return redirect()->to('pelanggan')->with('success', 'Berhasil Memperbaharui Data');
        } else {
            return redirect()->to('pelanggan')->with('success', 'Berhasil Menambahkan Data');
        }
    }

    public function delete($id=''){
        if(empty($id)){
            return redirect()->to('pelanggan')->with('error', 'Gagal Menghapus Data');
        }
        $delete = $this->customer_model->delete($id);
        if($delete){
            return redirect()->to('pelanggan')->with('success', 'Berhasil Menghapus Data');
        }
    }
}