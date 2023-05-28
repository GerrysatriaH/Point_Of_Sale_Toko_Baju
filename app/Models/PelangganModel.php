<?php

namespace App\Models;

use CodeIgniter\Model;

class PelangganModel extends Model {

    protected $table = 'pelanggan';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;

    protected $allowedFields = ['tipe', 'discount'];

    public function detailPelanggan($id = null) {
        $builder = $this->builder($this->table)->select('id, tipe, discount');
        if (empty($id)) {
            return $builder->get()->getResult();
        } else {
            return $builder->where('id', $id)->get(1)->getRow();
        }
    }
}