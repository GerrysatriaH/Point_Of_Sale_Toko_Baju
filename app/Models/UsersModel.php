<?php

namespace App\Models;

use CodeIgniter\Model;

class UsersModel extends Model {

    protected $table      = 'users';
    protected $primaryKey = 'id';
    
    protected $useAutoIncrement = true;
    protected $useTimestamps = true;

    protected $allowedFields = ['username', 'email', 'password', 'nama', 'alamat', 'role_id', 'status'];

    protected $rules = [
        'email'     => 'required|is_unique[users.email]',
        'username'  => 'required|min_length[2]|max_length[50]|alpha_numeric',
        'password'  => 'required|min_length[2]|max_length[255]',
        'nama'      => 'required|min_length[2]|max_length[50]|alpha_space',
        'alamat'    => 'required|min_length[2]|max_length[255]'
    ];

    protected $rulesValidation = [
        'email' => [
            'required'  => 'Email harus terisi',
            'is_unique' => 'Email telah terdaftar'
        ],
        'username' => [
            'required'      => 'Username harus terisi',
            'min_length'    => 'Username minimal terdiri dari 2 karakter',
            'max_length'    => 'Username maksimal terdiri dari 50 karakter',
            'alpha_numeric' => 'Username hanya boleh terdiri dari huruf dan angka'
        ],
        'password' => [
            'required'      => 'Password harus terisi',
            'min_length'    => 'Password minimal terdiri dari 2 karakter',
            'max_length'    => 'Password maksimal terdiri dari 255 karakter'
        ],
        'nama' => [
            'required'      => 'Nama harus terisi',
            'min_length'    => 'Nama minimal terdiri dari 2 karakter',
            'max_length'    => 'Nama maksimal terdiri dari 50 karakter',
            'alpha_space'   => 'Nama hanya boleh terdiri dari huruf dan spasi'
        ],
        'alamat' => [
            'required'      => 'Alamat harus terisi',
            'min_length'    => 'Alamat minimal terdiri dari 2 karakter',
            'max_length'    => 'Alamat maksimal terdiri dari 255 karakter'
        ]
    ];
}