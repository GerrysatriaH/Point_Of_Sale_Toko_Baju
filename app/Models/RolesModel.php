<?php

namespace App\Models;

use CodeIgniter\Model;

class RolesModel extends Model {

    protected $table      = 'roles';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    
    protected $allowedFields = ['role'];
}