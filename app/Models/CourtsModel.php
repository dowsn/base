<?php

namespace App\Models;

class ProductModel extends \CodeIgniter\Model
{

  // has to match table in database
  protected $table = 'courts';

  protected $allowedFields = ['name', 'pretty_url'];

  protected $validationRules = [
    'name' => 'required|is_unique[courts.name]',
    // 'price' => 'required',
    'pretty_url' => 'required|is_unique[courts.pretty_url]',
  ];


  // name of callback function, this function will be called before the insert is made, this is called model event and is conducted before insert

  // if false then not needed created_at and updated_at field
  protected $useTimestamps = true;

  // after getting the return we use this entity and we can apply methods on that
  // connection with entities - takes the row with empty columns
  // now each record will be an object of entity class and not associative array
  protected $returnType = 'App\Entities\Courts';

  protected $validationMessage = [
    'pretty_Url' => [
      'required' => 'Please, enter full pretty URL.',
      'is_unique[products.name]' => 'This product pretty url already exist.'
    ],
    'name' => [
      'required' => 'Please, enter full name of the product.',
      'is_unique[products.name]' => 'This product name already exist.'
    ],

  ];


  public function findProductByPrettyUrl($pretty_url) {

      // this automatically escapes the valu we passed
  return $this->where('pretty_url', $pretty_url)
  // like row
        ->first();
  }

  public function deleteProductByPrettyUrl($pretty_url) {

    // this automatically escapes the valu we passed
return $this->where('pretty_url', $pretty_url)
// like row
      ->delete();
}

}