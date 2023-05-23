<?php

namespace App\Controllers;



class Signup extends BaseController
{

    private $model;
    private $current_user;

        function __construct () {
        // $this->model = new \App\Models\UserModel;
        // $this->current_user = service('auth')->getCurrentUser();
    }

    public function new()
    {

      return view('backend/Signup/new');

    }

}