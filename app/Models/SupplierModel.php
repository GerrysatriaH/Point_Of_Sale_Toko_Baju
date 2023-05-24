<?php 

namespace App\Models;

use CodeIgniter\Model;

class SupplierModel extends Model {

    protected $table = 'supplier';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    
    protected $allowedFields = ['nama', 'no_telp', 'alamat'];   
}