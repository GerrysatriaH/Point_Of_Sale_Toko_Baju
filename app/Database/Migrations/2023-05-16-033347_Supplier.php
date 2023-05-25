<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Supplier extends Migration {

	public function up() {

		// Supplier
		$this->forge->addField([

			'id'                => [
                'type'              => 'INT', 
                'constraint'        => 11, 
                'unsigned'          => true, 
                'auto_increment'    => true
            ],
			'nama'      => [
                'type'          => 'VARCHAR', 
                'constraint'    => 50
            ],
			'no_telp'      => [
                'type'          => 'VARCHAR', 
                'constraint'    => 20
            ],
			'email'      => [
                'type'          => 'VARCHAR', 
                'constraint'    => 50
            ],
			'alamat'    => [
                'type'          => 'VARCHAR', 
                'constraint'    => 100
            ],
			'created_at datetime default current_timestamp',
			'updated_at datetime default current_timestamp on update current_timestamp'
		]);

		$this->forge->addKey('id', true);
		$this->forge->createTable('supplier', true);

		$this->db->table('supplier')->insertBatch([
            [
                'nama'  	=> 'FashionEmporium',
                'no_telp' 	=> '081213141516',
                'email'  	=> 'fashionemp@gmail.com',
                'alamat'    => 'Jl. Raya Mode No. 123'
            ],
            [
                'nama'  	=> 'GarmentGuru',
                'no_telp'   => '082223242526',
                'email' 	=> 'garmeng@gmail.com',
                'alamat'    => 'Jl. Pakaian Sejati No. 456'
            ],
            [
                'nama'  	=> 'StyleMakers',
                'no_telp'   => '083132343536',
                'email'  	=> 'stylem@gmail.com',
                'alamat'    => 'Jl. Kreativitas Fashion No. 789'
            ],
        ]);
	}

	//--------------------------------------------------------------------

	public function down() {

		$this->forge->dropTable('supplier', true);
	}
}
