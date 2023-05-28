<?php

namespace App\Controllers;

use App\Models\UsersModel;
use App\Models\RolesModel;

class User extends BaseController{

    protected $data;
    protected $session;
    protected $user_model;
    protected $role_model;

    public function __construct(){
        
        $this->user_model = New UsersModel();
        $this->role_model = New RolesModel();
        $this->session= \Config\Services::session();

        $this->data['session'] = $this->session;
    }

    public function user_manage(){

        $this->data['title'] = "Daftar Pengguna";
        $this->data['breadcrumbs'] = array(
            array(
                'title' => 'Dashboard',
                'url' => base_url()
            ),
            array(
                'title' => 'Daftar Pengguna'
            )
        );

        $this->data['users'] = $this->user_model->orderBy('id ASC')
                              ->select('users.id, users.email, 
                                        users.username, users.status, 
                                        roles.role')
                              ->join('roles', 'roles.id = users.role_id')
                              ->get()->getResult();

        return view('user/user_manage/index', $this->data);
    }

    public function create(){

        $this->data['title'] = "Daftar Pengguna";
        $this->data['breadcrumbs'] = array(
            array(
                'title' => 'Dashboard',
                'url' => base_url()
            ),
            array(
                'title' => 'Daftar Pengguna',
                'url' => base_url('/user/user_manage')
            ),
            array(
                'title' => 'Tambah Data Pengguna'
            )
        );

        $this->data['role'] = $this->role_model->orderBy('id ASC')->select('*')->get()->getResult();

        return view('user/user_manage/create', $this->data);
    }

    public function update($id=''){

        $this->data['title'] = "Daftar Pengguna";
        $this->data['breadcrumbs'] = array(
            array(
                'title' => 'Dashboard',
                'url' => base_url()
            ),
            array(
                'title' => 'Daftar Pengguna',
                'url' => base_url('/user/user_manage')
            ),
            array(
                'title' => 'Tambah Data Pengguna'
            )
        );

        if(empty($id)){
            return redirect()->to('supplier')->with('error', 'Data Tidak Ditemukan');
        }

        $this->data['data'] = $this->user_model->orderBy('id ASC')->select('*')->where(['id'=>$id])->first();
        $this->data['role'] = $this->role_model->orderBy('id ASC')->select('*')->get()->getResult();

        return view('user/user_manage/edit', $this->data);
    }

    public function create_user(){
        $status = 'aktif';
        $data = [
            'username' => $this->request->getVar('username'),
            'email'    => $this->request->getVar('email'),
            'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
            'status'   => $status,
            'role_id'  => $this->request->getVar('role')
        ];

        $this->user_model->insert($data);
        return redirect()->to('user/user_manage')->with('success', 'Berhasil Menambahkan Data');
    }

    public function update_user($id=''){
        $data = [
            'username' => $this->request->getVar('username'),
            'email'    => $this->request->getVar('email'),
            'status'   => $this->request->getVar('status'),
            'role_id'  => $this->request->getVar('role')
        ];

        $this->user_model->where(['id'=> $id])->set($data)->update();
        return redirect()->to('user/user_manage')->with('success', 'Berhasil Memperbaharui Data');
    }

    public function delete_user($id=''){
        if(empty($id)){
            return redirect()->to('user/user_manage')->with('error', 'Gagal Menghapus Data');
        }
        $delete = $this->user_model->delete($id);
        if($delete){
            return redirect()->to('user/user_manage')->with('success', 'Berhasil Menghapus Data');
        }
    }

    public function profile($id=''){
        $this->data['title'] = 'Profile Pengguna';
        $this->data['breadcrumbs'] = array(
            array(
                'title' => 'Dashboard',
                'url' => base_url()
            ),
            array(
                'title' => 'Profile Pengguna'
            )
        );

        // $this->data['profil'] = $this->
        return view('user/profile/index', $this->data);
    }
}