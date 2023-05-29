<?php

namespace App\Models;

use CodeIgniter\Model;

class PembelianModel extends Model
{
    protected $table = 'pembelian';
    protected $primaryKey = 'id';
    protected $allowedFields = ['product_id', 'customer_id','jumlah'];

    public function produk() {
        return $this->belongsTo(ProdukModel::class, 'product_id', 'id');
    }

    public function pelanggan() {
        return $this->belongsTo(PelangganModel::class, 'customer_id', 'id');
    }

    public function getDataItem(){
        return $this->select('produk.nama_produk, produk.harga, pembelian.jumlah, (produk.harga * jumlah) As total')
                    ->join('produk', 'produk.id = pembelian.product_id')
                    ->join('pelanggan', 'pelanggan.id = pembelian.customer_id')
                    ->get()
                    ->getResult();
    }
}
