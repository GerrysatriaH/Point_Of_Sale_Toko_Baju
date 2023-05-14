<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Users extends Migration {

    public function up() {

        // Add Field Table Roles
		$this->forge->addField([
			'id'         => [
                'type'              => 'INT', 
                'constraint'        => 11, 
                'auto_increment'    => true
            ],
			'role' => [
                'type'	            => 'VARCHAR', 
                'constraint'        => 30
            ]
		]);

        // Add Primary Key
		$this->forge->addKey('id', true);
        // Create Field Table Roles
		$this->forge->createTable('roles', true);

        // Insert Table Roles
        $this->db->table('roles')->insertBatch([
            ['role' => 'Super Admin'],
            ['role' => 'Administrator'],
            ['role' => 'Kasir'],
        ]);

		// Add Field Table Users
		$this->forge->addField([
			'id'            => [
                'type'              => 'INT', 
                'constraint'	    => 11, 
                'unsigned'          => true, 
                'auto_increment'    => true
            ],
			'email'			=> [
                'type'          => 'VARCHAR', 
                'constraint'    => 50
            ],
			'username'		=> [
                'type'          => 'VARCHAR', 
                'constraint'    => 50, 
                'null'          => true
            ],
			'password'		=> [
                'type'          => 'VARCHAR', 
                'constraint'    => 255
            ],
			'nama'			=> [
                'type'          => 'VARCHAR', 
                'constraint'    => 50, 
                'null'          => true
            ],
			'alamat'		=> [
                'type'          => 'VARCHAR', 
                'constraint'    => 255, 
                'null'          => true
            ],
			'avatar'        => [
                'type'          => 'VARCHAR', 
                'constraint'    => 255, 
                'default'       => 'avatar.jpg'
            ],
			'status'		=> [
                'type'          => 'ENUM', 
                'constraint'     => ['aktif', 'non-aktif'],
                'default'       => 'aktif'
            ],
			'role_id'		=> [
                'type'          => 'INT', 
                'constraint'    => 11
            ],
			'created_at datetime default current_timestamp',
			'updated_at datetime default current_timestamp on update current_timestamp'
		]);

        // Add Primary Key
		$this->forge->addKey('id', true);
        // Define Unique Attribute
	    $this->forge->addUniqueKey(['email', 'username']);
        // Add Foreign Key
		$this->forge->addForeignKey('role_id', 'roles', 'id', 'CASCADE', 'RESTRICT');
        // Create Table Users
		$this->forge->createTable('users', true);
        
        // Insert Table Users
        $this->db->table('users')->insertBatch([
            [
                'username'  => 'superadmin',
                'email'     => 'superadmin@gmail.com',
                'password'  => password_hash('superadmin', PASSWORD_DEFAULT),
                'nama'      => 'Super Admin',
                'alamat'    => 'Cibinong, Bogor',
                'role_id'   => 1,
            ],
            [
                'username'  => 'admin',
                'email'     => 'admin@gmail.com',
                'password'  => password_hash('admin', PASSWORD_DEFAULT),
                'nama'      => 'Admin',
                'alamat'    => 'Ciriung, Bogor',
                'role_id'   => 2,
            ],
            [
                'username'  => 'kasir',
                'email'     => 'kasir@gmail.com',
                'password'  => password_hash('kasir', PASSWORD_DEFAULT),
                'nama'      => 'Kasir',
                'alamat'    => 'Cilodong, Depok',
                'role_id'   => 3,
            ],
        ]);
    }

    public function down() {
        // Drop Table
		$this->forge->dropTable('users', true);
        $this->forge->dropTable('roles');
    }
}
