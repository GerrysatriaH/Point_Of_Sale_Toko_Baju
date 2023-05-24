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
			'nama'      => [
                'type'	        => 'VARCHAR', 
                'constraint'    => 50
            ],
			'no_telp'    => [
                'type'          => 'VARCHAR', 
                'constraint'	=> 20
            ],
            'email'    => [
                'type'          => 'VARCHAR', 
                'constraint'	=> 50
            ],
			'tipe'   => [
                'type'          => 'ENUM', 
                'constraint'     => ['Umum', 'Membership'],
                'default'       => 'Umum'
            ],
			'created_at datetime default current_timestamp',
			'updated_at datetime default current_timestamp on update current_timestamp'
		]);

		$this->forge->addKey('id', true);
		$this->forge->createTable('pelanggan', true);
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('pelanggan', true);
	}
}