<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class DetailTransaksi extends Migration
{
    public function up() {

        $this->forge->addField([
            'id' => [
                'type'              => 'INT',
                'constraint'        => 11,
                'unsigned'          => true, 
                'auto_increment'    => true
            ],
            'id_transaksi' => [
                'type'              => 'INT',
                'constraint'        => 11,
                'unsigned'          => true
            ],
            'nama_produk' => [
                'type'          => 'VARCHAR', 
                'constraint'	=> 100
            ],
            'harga' => [
                'type'          => 'INT', 
                'constraint'    => 11, 
                'unsigned'      => true
            ],
            'jumlah' => [
                'type'          => 'INT',
                'constraint'    => 11
            ],
            'total_harga' => [
                'type'          => 'INT',
                'constraint'    => 11
            ]
        ]);

        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('id_transaksi', 'transaksi', 'id');

        $this->forge->createTable('detail_transaksi');
    }

    public function down() {

        $this->forge->dropTable('detail_transaksi');
    }
}
