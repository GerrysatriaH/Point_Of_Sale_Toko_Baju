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

    public function create_user(){

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

    public function update_user($id=''){

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

        $this->data['data'] = $this->user_model->orderBy('id ASC')->select('*')->where(['id'=>$id])->first();
        $this->data['role'] = $this->role_model->orderBy('id ASC')->select('*')->get()->getResult();

        return view('user/user_manage/edit', $this->data);
    }

    public function submit_changes_user(){
        $this->data['request'] = $this->request;
        $status = 'aktif';
        $post = [
            'username' => $this->request->getPost('username'),
            'email'    => $this->request->getPost('email'),
            'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
            'status'   => $status,
            'role_id'  => $this->request->getPost('role')
        ];

        $save = $this->user_model->insert($post);

        if($save){
            return redirect()->to('user/user_manage');
        } else {
            return redirect()->to('user/user_manage');
        }
    }

    public function save_changes_user($id=''){
        $this->data['request'] = $this->request;
        $post = [
            'username' => $this->request->getPost('username'),
            'email'    => $this->request->getPost('email'),
            'status'   => $this->request->getPost('status'),
            'role_id'  => $this->request->getPost('role')
        ];

        $save = $this->user_model->where(['id'=> $id])->set($post)->update();

        if($save){
            return redirect()->to('user/user_manage');
        } else {
            return redirect()->to('user/user_manage');
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