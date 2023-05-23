<?= $this->extend('layouts/default'); ?>

<?= $this->section('title'); ?> New User <?= $this->endSection(); ?>




<?= $this->section('content'); ?>


<?php if(session()->has("errors")): ?>



<ul class="invalid_data">
  <?php foreach(session("errors") as $error): ?>
  <li><?= $error ?></li>
  <?php endforeach ?>
</ul>

<?php endif ?>

<h1>New User</h1>


<?= form_open('/signup/create') ?>
<div>
  <label for="username">Username</label>
  <input type="text" name="username" id="username" value="<?= old('name') ?>">
</div>

<div>
  <label for="email">Email</label>
  <input type="text" name="email" id="email" value="<?= old('password') ?>">
</div>

<div>
  <label for="password">Password</label>
  <input type="text" name="password" id="password" value="">
</div>

<button>Sign Up</button>
<a href="<?= site_url("/") ?>">Cancel</a>


</form>



<p><?= $product->name ?></p>

<a href="<?= site_url('/products') ?>">Back</a>




<?= $this->endSection(); ?>