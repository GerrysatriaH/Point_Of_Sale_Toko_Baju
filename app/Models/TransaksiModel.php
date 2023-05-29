<?php 

namespace App\Models;

use CodeIgniter\Model;

class TransaksiModel extends Model {

    protected $table = 'transaksi';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    
    protected $allowedFields = [
        'tanggal_transaksi', 
        'nama_kasir', 
        'sub_total',
        'diskon',
        'total_akhir',
        'tunai',
        'kembalian'
    ];   
}