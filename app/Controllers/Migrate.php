<?php

namespace App\Controllers;

class Migrate extends BaseController {
public function index() {
  // connection to migration service
  $migrate = \Config\Services::migrations();


  try { // then we call latest method on that object
    $migrate->latest();

    echo 'migration ok';
  } catch (\Exception $e) {

    echo $e->getMessage();
  }

}
}