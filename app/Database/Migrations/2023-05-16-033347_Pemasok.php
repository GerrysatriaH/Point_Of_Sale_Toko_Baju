<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Pemasok extends Migration {

	public function up() {

		// Pemasok
		$this->forge->addField([

			'id'                => [
                'type'              => 'INT', 
                'constraint'        => 11, 
                'unsigned'          => true, 
                'auto_increment'    => true
            ],
			'nama_pemasok'      => [
                'type'          => 'VARCHAR', 
                'constraint'    => 50
            ],
			'telp_pemasok'      => [
                'type'          => 'VARCHAR', 
                'constraint'    => 20
            ],
			'alamat_pemasok'    => [
                'type'          => 'VARCHAR', 
                'constraint'    => 100
            ],
			'created_at datetime default current_timestamp',
			'updated_at datetime default current_timestamp on update current_timestamp'
		]);

		$this->forge->addKey('id', true);
		$this->forge->createTable('pemasok', true);
	}

	//--------------------------------------------------------------------

	public function down() {

		$this->forge->dropTable('pemasok', true);
	}
}
