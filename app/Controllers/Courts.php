<?php

namespace App\Controllers;

// better to specify here in general
// then I can just write new Task that creates a new entity
use \App\Entities\Product;

class Products extends BaseController
{
  private $model;
  private $current_user;

      function __construct () {
      $this->model = new \App\Models\CourtsModel;
      // $this->current_user = service('auth')->getCurrentUser();
  }

  public function index(){

    $data = $this->model->findAll();

    return view('frontend/Courts/index', [
        'courts' => $data,

        // instance of pager object in view we call links method on it
        // 'pager' => $this->model->pager

    ]);
  }



}