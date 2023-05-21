<?php

namespace App\Models;

use CodeIgniter\Model;

class KategoriModel extends Model {

    protected $table = 'kategori';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;

    protected $allowedFields = ['kategori'];

}