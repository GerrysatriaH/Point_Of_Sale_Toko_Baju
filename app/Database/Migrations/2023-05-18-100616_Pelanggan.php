<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Pelanggan extends Migration {
	public function up() {

		// Tabel pelanggan
		$this->forge->addField([
			'id'        => [
                'type'              => 'INT', 
                'constraint'        => 11, 
                'unsigned'          => true, 
                'auto_increment'    => true
            ],
			'tipe'   => [
                'type'          => 'VARCHAR', 
                'constraint'    => 20
            ],
			'discount' => [
				'type'       => 'DECIMAL',
                'constraint' => '5,2',
			],
			'created_at datetime default current_timestamp',
			'updated_at datetime default current_timestamp on update current_timestamp'
		]);

		$this->forge->addKey('id', true);
		$this->forge->createTable('pelanggan', true);

		$this->db->table('pelanggan')->insertBatch([
			[
				'tipe' 		=> 'Umum',
				'discount' 	=> 0.0
			],
			[
				'tipe' 		=> 'Membership',
				'discount' 	=> 10.0
			]
		]);
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('pelanggan', true);
	}
}