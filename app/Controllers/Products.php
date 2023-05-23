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
        $this->model = new \App\Models\ProductModel;
        // $this->current_user = service('auth')->getCurrentUser();
    }
    public function index()
    {


        // $data =  [
        //     ['id' => 1, 'description' => 'First Task'],
        //     ['id' => 2, 'description' => 'Second Task']
        // ];

        // this way I would get all of them and not just those for the user
        // $data = $this->model->findAll();


        // $data = $this->model->paginateTasksByUserId($this->current_user->id);


        // same as below for printing
        // dd($data);
        // var_dump($data);
        // exit;


        $data = $this->model->findAll();

        return view('frontend/Products/index', [
            'products' => $data,

            // instance of pager object in view we call links method on it
            // 'pager' => $this->model->pager

        ]);
    }

    public function show($pretty_url) {

        $product = $this->getProductOr404($pretty_url);


        return view('frontend/Products/show', ['product' => $product]);
    }

    public function new() {
// optional if I'm using universal form.php

// if working with array and not entity object
// $task = ['description' => ''];


// better because I don't have to update this when I add new input fields
// I don't put the whole path because I specify the entity on top by use
$product = new Product;

        return view('frontend/Products/new', ['product' => $product]);
    }


    public function create() {
        // put if they are part of request - request is available and get post saves pain I don't have to check if values are null
        $product = new Product($this->request->getPost());



        // assigning user_id property of the user to task;
        // we do this after getting data from the form so there is unlikely that user id from the form will be overwritten.
        // $product->user_id = $this->current_user->id;

        //

        // instead of if isset POST then it is post bla bla
        // return value will be either false or integer with the new id, so not usable as url for update method
        $result = $this->model->insert($product
        // instead of this
            // ['description' =>  $this->request->getPost('description')]
        );

        // result is id of created product return after insert
        if($result) {

            return redirect()->to("/products") // optionally I don't have to use $result and work directly with model->insert
                                    // then here would be $model->insertId instead of
                             ->with('info', 'Product was created successfully.');


        } else {
        //    dd($this->model->errors());

            // go to previous page, needs to be returned
            return redirect()->back()
            // to pass back the errors, this method uses passing back the data using the session
                        ->with('errors', $this->model->errors()) // key and value
                        ->with('warning', 'Invalid Data')
         // useful if more input fields that it reloads the old
                         ->withInput();
        }
    }

    public function edit($pretty_url) {



        $product = $this->getProductOr404($pretty_url);


        // just to get the data from the database


        return view('frontend/Products/edit', ['product' => $product]);
    }

    public function update($pretty_url) {


        // 1) find row
        $product =  $this->getProductOr404($pretty_url);

        // 2) get post
        // here someone might manipulate form data so we unset it before getting it
        $post = $this->request->getPost();
        // unset($post['user_id']); // anyway this one I won't be updating so what

        // 3) fill it in
        // fills only allowed fields on the model, on entity unlimited, entity method
        $product->fill($post);


        if (!$product->hasChanged()) {
            return redirect()->back()
                            ->with('warning', 'Nothing to update')
                            ->withInput();
        }

        // 4) save
        if($this->model->save($product)) {


        // instead of calling update method on model
        // $result = $model->update($id, [
        //     'description' =>  $this->request->getPost('description')
        // ]);
        return redirect()->to("/products")
        ->with('info', 'Product was updated successfully.');

        // if($result == false) {



        } else {
            return redirect()->back()
                             ->with('errors', $this->model->errors())
                             ->with('warning', 'Invalid Data')
                        // sending the previous value of input added, so it can be processed with old()
                             ->withInput();

        }


    }

    public function delete($pretty_url) {

        $product = $this->getProductOr404($pretty_url);

        if($this->request->getMethod() === 'post') {
            $this->model->deleteProductByPrettyUrl($pretty_url);

            return redirect()->to('/products')
                            ->with('info', 'Product Deleted');

        }

        return view('frontend/Products/delete', ['product' => $product]);

    }



    private function getProductOr404($pretty_url) {
                // creating task model object


                // $task = $this->model->getTaskByUserId($id, $this->current_user->id);

                // below without model

                // $product = $this->model->where('pretty_url', $pretty_url);

                $product = $this->model->findProductByPrettyUrl($pretty_url);

                // ('pretty_url', $pretty_url);


                // if($task !== null && $task->user_id !== $user->id) {
                //     $task = null;
                // }

                if($product === null) {
                    // uses views errors/404 which can be stylized
                    throw new \CodeIgniter\Exceptions\PageNotFoundException("$pretty_url nicht gefunden");
                }

                return $product;
    }


}