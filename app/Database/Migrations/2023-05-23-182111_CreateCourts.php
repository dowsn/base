<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;


class CreateCourts extends Migration
{

  public function up() {
    // created at an updated_at are automatic
    $this->forge->addField([
     'id' => [
      'type' => 'INT',
      'constraint' => 5,
      'unsigned' => true,
      'auto_incremented'=> true
     ],
    'name' => [
      'type' => 'VARCHAR',
      'constraint' => 128,
    ],
    'pretty_url' => [
      'type' => 'VARCHAR',
      'constraint' => 255,
    ]
    ]
     );

     $this->forge->addPrimaryKey('id')
     ->addUniqueKey('name');

     $this->forge->createTable('courts');



  }

  public function down() {
    $this->forge->dropTable('courts');

  }
}