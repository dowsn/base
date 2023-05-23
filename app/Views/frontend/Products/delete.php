<?= $this->extend('layouts/default'); ?>

<?= $this->section('title'); ?> Delete Product <?= $this->endSection(); ?>




<?= $this->section('content'); ?>

<?php if(session()->has("errors")): ?>



<ul class="invalid_data">
  <?php foreach(session("errors") as $error): ?>
  <li><?= $error ?></li>
  <?php endforeach ?>
</ul>

<?php endif ?>

<h1>Delete Product</h1>
<p><?= $product->name ?></p>

<p>Are you sure</p>

<?= form_open('/products/delete/' . esc($product->pretty_url)) ?>

<button>Yes</button>
<a href="<?= site_url('/products') ?>">Back</a>

</form>




<?= $this->endSection(); ?>