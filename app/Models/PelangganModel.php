<?php

namespace App\Models;

use CodeIgniter\Model;

class PelangganModel extends Model {

    protected $table = 'pelanggan';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;

    protected $allowedFields = ['nama', 'gender', 'tipe', 'no_telp', 'alamat'];
}