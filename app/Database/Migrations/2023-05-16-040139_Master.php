<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Master extends Migration {

	public function up() {

		// Kategori
		$this->forge->addField([
			'id'            => [
                'type'              => 'INT', 
                'constraint'	    => 11, 
                'unsigned'          => true, 
                'auto_increment'    => true
            ],
			'kategori'	=> [
                'type'          => 'VARCHAR', 
                'constraint'    => 50
            ],
			'created_at datetime default current_timestamp',
			'updated_at datetime default current_timestamp on update current_timestamp'
		]);

		$this->forge->addKey('id', true);
		$this->forge->createTable('kategori', true);

        $this->db->table('kategori')->insertBatch([
            ['kategori' => 'Baju'],
            ['kategori' => 'Celana'],
            ['kategori' => 'Gaun'],
            ['kategori' => 'Seragam'],
            ['kategori' => 'Jaket'],
            ['kategori' => 'Kemeja'],
        ]);

		// Ukuran
		$this->forge->addField([
			'id'        => [
                'type'              => 'INT', 
                'constraint'	    => 11, 
                'unsigned'          => true, 
                'auto_increment'    => true
            ],
			'ukuran'	=> [
                'type'          => 'VARCHAR', 
                'constraint'    => 50
            ],
			'created_at datetime default current_timestamp',
			'updated_at datetime default current_timestamp on update current_timestamp'
		]);

		$this->forge->addKey('id', true);
		$this->forge->createTable('ukuran', true);

        $this->db->table('ukuran')->insertBatch([
            ['ukuran' => 'XS'],
            ['ukuran' => 'S'],
            ['ukuran' => 'M'],
            ['ukuran' => 'L'],
            ['ukuran' => 'XL'],
            ['ukuran' => 'XXL'],
        ]);

		// Product
		$this->forge->addField([
			'id'            => [
                'type'              => 'INT', 
                'constraint'        => 11, 
                'unsigned'          => true, 
                'auto_increment'    => true
            ],
			'kode_produk'	    => [
                'type'          => 'VARCHAR', 
                'constraint'	=> 50,
            ],
			'nama_produk'	=> [
                'type'          => 'VARCHAR', 
                'constraint'	=> 100
            ],
			'id_kategori'	=> [
                'type'          => 'INT', 
                'constraint'	=> 11, 
                'unsigned'      => true
            ],
			'id_ukuran'	    => [
                'type'          => 'INT', 
                'constraint'    => 11, 
                'unsigned'      => true
            ],
			'id_supplier'    => [
                'type'          => 'INT', 
                'constraint'    => 11, 
                'unsigned'      => true
            ],
			'harga'	        => [
                'type'          => 'INT', 
                'constraint'    => 11, 
                'unsigned'      => true
            ],
			'stok'	        => [
                'type'          => 'INT', 
                'constraint'	=> 11, 
                'unsigned'      => true
            ],
			'created_at datetime default current_timestamp',
			'updated_at datetime default current_timestamp on update current_timestamp'
		]);

		$this->forge->addKey('id', true)->addKey(['id_kategori', 'id_ukuran', 'id_supplier'])->addUniqueKey('kode_produk');

		$this->forge->addForeignKey('id_kategori', 'kategori', 'id', 'cascade', 'restrict');
		$this->forge->addForeignKey('id_ukuran', 'ukuran', 'id', 'cascade', 'restrict');
		$this->forge->addForeignKey('id_supplier', 'supplier', 'id', 'cascade', 'restrict');

		$this->forge->createTable('produk', true);
	}

	//--------------------------------------------------------------------

	public function down() {
		$this->forge->dropTable('kategori', true);
		$this->forge->dropTable('ukuran', true);
		$this->forge->dropTable('produk', true);
	}
}