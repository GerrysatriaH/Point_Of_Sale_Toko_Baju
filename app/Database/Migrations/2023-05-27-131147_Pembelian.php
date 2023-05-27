<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Pembelian extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'product_id' => [
                'type'          => 'INT',
                'constraint'    => 11,
                'unsigned'      => true,
            ],
            'customer_id' => [
                'type'          => 'INT',
                'constraint'    => 11,
                'unsigned'      => true,
            ],
            'jumlah' => [
                'type'          => 'INT',
                'constraint'    => 11
            ]
        ]);

        $this->forge->addForeignKey('product_id', 'produk', 'id');
        $this->forge->addForeignKey('customer_id', 'pelanggan', 'id');

        $this->forge->createTable('pembelian');
    }

    public function down()
    {
        $this->forge->dropTable('pembelian');
    }
}
