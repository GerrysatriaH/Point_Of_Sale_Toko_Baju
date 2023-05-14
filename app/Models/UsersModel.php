<?php

namespace App\Models;

use CodeIgniter\Model;

class UsersModel extends Model {

    protected $table      = 'users';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $useTimestamps = true;
    protected $allowedFields = ['username', 'email', 'password', 'nama', 'alamat', 'role_id', 'avatar', 'status'];
}
