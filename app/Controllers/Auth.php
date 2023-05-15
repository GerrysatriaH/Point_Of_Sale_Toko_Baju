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

    public function login() {

        $this->data['title'] = "Login Form";
        return view('auth/login', $this->data);
    }

    public function auth_login() {

        $rules = $this->userModel->rules;
        $message_error = $this->userModel->rulesValidation;

        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');
        
        $data_user = $this->userModel->where('username', $username)->first();
    
        if ($data_user) {
            $password_check = password_verify($password, $data_user['password']);
            if (!$password_check){
                if (!$this->validate($rules, $message_error)){
                    session()->setFlashdata('not_valid', $this->validator->getErrors());
                    return redirect()->back()->withInput();
                } else {
                    session()->setFlashdata('error', 'Password Salah !');
                    return redirect()->to(base_url('auth/login'))->withInput();
                } 
            } else {
                session()->set([
                    'username' => $data_user['username'],
                    'role_id' => $data_user['role_id'],
                    'logged_in' => true
                ]);
                return redirect()->to(base_url('/dashboard'));
            }
        } else {
            if (!$this->validate($rules, $message_error)){
                session()->setFlashdata('not_valid', $this->validator->getErrors());
                return redirect()->back()->withInput();
            } else {
                session()->setFlashdata('error', 'Username belum terdaftar !');
                return redirect()->to(base_url('auth/login'))->withInput();
            }    
        }
    }

    public function register() {

        $this->data['title'] = "Register Form";
        return view('auth/register', $this->data);
    }

    public function auth_register() {

    }
}