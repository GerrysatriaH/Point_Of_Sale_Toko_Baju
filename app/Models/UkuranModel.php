<?php

namespace App\Models;

use CodeIgniter\Model;

class UkuranModel extends Model {

    protected $table = 'ukuran';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;

    protected $allowedFields = ['ukuran'];

}