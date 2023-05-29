<?php 

namespace App\Models;

use CodeIgniter\Model;

class DetailTransaksiModel extends Model {

    protected $table = 'detail_transaksi';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    
    protected $allowedFields = [
        'id_transaksi', 
        'nama_produk', 
        'harga',
        'jumlah',
        'total_harga'
    ];   
}