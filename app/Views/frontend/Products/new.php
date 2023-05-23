<?= $this->extend('layouts/default'); ?>

<?= $this->section('title'); ?> New Product <?= $this->endSection(); ?>




<?= $this->section('content'); ?>


<?php if(session()->has("errors")): ?>



<ul class="invalid_data">
  <?php foreach(session("errors") as $error): ?>
  <li><?= $error ?></li>
  <?php endforeach ?>
</ul>

<?php endif ?>

<h1>New Product</h1>


<?= form_open('/products/create') ?>
<div>
  <label for="name">Name</label>
  <input type="text" name="name" id="name" value="">
</div>

<div>
  <label for="price">Price</label>
  <input type="text" name="price" id="price" value="">
</div>

<div>
  <label for="pretty_url">Pretty URL</label>
  <input type="text" name="pretty_url" id="pretty_url" value="">
</div>

<button>Save</button>
<a href="<?= site_url("/pruducts") ?>">Cancel</a>


</form>



<p><?= $product->name ?></p>

<a href="<?= site_url('/products') ?>">Back</a>




<?= $this->endSection(); ?>