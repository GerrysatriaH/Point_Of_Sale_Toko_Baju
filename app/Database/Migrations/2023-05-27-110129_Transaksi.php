<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Transaksi extends Migration
{
    public function up() {
        
        // Pembelian
        $this->forge->addField([
            'id'               => [
                'type'              => 'INT', 
                'constraint'        => 11, 
                'unsigned'          => true, 
                'auto_increment'    => true
            ], 
            'id_produk'         => [
                'type'              => 'INT',
                'constraint'        => 11,
                'unsigned'          => true
            ], 
            'id_pelanggan'      => [
                'type'              => 'INT',
                'constraint'        => 11,
                'unsigned'          => true
            ],
            'jumlah'            => [
                'type'              => 'INT',
                'contraint'         => 11
            ],
            'total_tunai'       => [
                'type'              => 'INT',
                'contraint'         => 11
            ]
        ]);

        $this->forge->addKey('id', true)->addKey(['id_produk', 'id_pelanggan']);

        $this->forge->addForeignKey('id_produk', 'produk', 'id', 'cascade', 'restrict');
		$this->forge->addForeignKey('id_pelanggan', 'pelanggan', 'id', 'cascade', 'restrict');

        $this->forge->createTable('transaksi', true);
    }

    public function down() {
        $this->forge->dropTable('transaksi', true);
    }
}
