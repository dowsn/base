<?= $this->extend('layouts/default'); ?>

<?= $this->section('title'); ?> Edit Product <?= $this->endSection(); ?>




<?= $this->section('content'); ?>

<?php if(session()->has("errors")): ?>



<ul class="invalid_data">
  <?php foreach(session("errors") as $error): ?>
  <li><?= $error ?></li>
  <?php endforeach ?>
</ul>

<?php endif ?>

<h1>Edit Product</h1>



<?= form_open('/products/update/' . esc($product->pretty_url)) ?>


<?= $this->include('frontend/Products/form'); ?>

</form>



<p><?= $product->name ?></p>

<a href="<?= site_url('/products') ?>">Back</a>




<?= $this->endSection(); ?>