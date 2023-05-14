<?php

namespace App\Controllers;

use App\Models\UsersModel;

class Auth extends BaseController {
    protected $session;
    protected $data;
    protected $userModel;

    public function __construct() {
        $this->userModel = new UsersModel();

        $this->session= \Config\Services::session();
        $this->data['session'] = $this->session;
    }

    public function index() {

        $this->data['title'] = "Login Form";
        helper('form');

        return view('auth/login', $this->data);
    }

    public function process() {

        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');

        $data_user = $this->userModel->where('username', $username)->first();
        $password_check = password_verify($password, $data_user['password']);
        
        if (!$data_user || !$password_check) {
            session()->setFlashdata('error', 'Login gagal');
            return redirect()->back()->withInput();
        } else {
            session()->set([
                'username' => $data_user['username'],
                'role_id' => $data_user['role_id'],
                'logged_in' => true
            ]);
            return redirect()->to('/dashboard');
        }
    }
}