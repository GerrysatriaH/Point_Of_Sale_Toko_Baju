<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Transaksi extends Migration
{
    public function up() {

        $this->forge->addField([
            'id'                => [
                'type'              => 'INT',
                'constraint'        => 11,
                'unsigned'          => true, 
                'auto_increment'    => true
            ],
            'tanggal_transaksi' => [
                'type'  => 'DATE'
            ],
            'nama_kasir'        => [
                'type'              => 'VARCHAR',
                'constraint'        => 50,
                null                => true
            ],
            'sub_total'         => [
                'type'       => 'INT',
                'constraint' => 11
            ],
            'diskon'            => [
                'type'       => 'INT',
                'constraint' => 11
            ],
            'total_akhir'       => [
                'type'       => 'INT',
                'constraint' => 11
            ],
            'tunai'             => [
                'type'       => 'INT',
                'constraint' => 11
            ],
            'kembalian'         => [
                'type'       => 'INT',
                'constraint' => 11
            ]
        ]);

        $this->forge->addKey('id', true);
        $this->forge->createTable('transaksi');
    }

    public function down() {
        $this->forge->dropTable('transaksi');
    }
}
