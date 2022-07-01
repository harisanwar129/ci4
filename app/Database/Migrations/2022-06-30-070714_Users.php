<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Users extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'email'          => [
				'type'           => 'VARCHAR',
				'constraint'     => '100',
			],
			'password'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '100',
			],
			'name'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '100',
			],
			'nik'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '100',
			],
			'pangkat'       => [
				'type'           => 'INT',
				'constraint'     => '100',
			],
			'tanggal_pk'       => [
				'type'           => 'DATETIME',
				
			],
            'jabatan'       => [
				'jabatan'           => 'VARCHAR',
				'constraint'     => '100',
			],
            'tanggal_jb'       => [
				'type'           => 'DATETIME',
				
			],
            'upload'       => [
				'jabatan'           => 'VARCHAR',
				'constraint'     => '100',
				
			],
            
            
			'created_at' => [
				'type'           => 'DATETIME',
				'null'       	 => true,
			],
			'updated_at' => [
				'type'           => 'DATETIME',
				'null'       	 => true,
			]

		]);
		$this->forge->addPrimaryKey('email', true);
		$this->forge->createTable('users');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('users');
	}
}