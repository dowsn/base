<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddIndexToTaskCreateAt extends Migration
{

  public function up() {


    // nonuniqu index

      $sql = 'ALTER TABLE task ADD INDEX (created_at)';


      $this->db->simpleQuery($sql);
    }





  public function down() {

    $this->db->simpleQuery(
      'ALTER TABLE task DROP INDEX created_at'
    );


  }
}
