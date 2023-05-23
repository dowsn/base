<?= $this->extend('layouts/default'); ?>

<?= $this->section('title'); ?><?= $product->name ?> <?= $this->endSection(); ?>


<?= $this->section('content'); ?>


<h1>Product</h1>



<p><?= esc($product->name) ?></p>

<a href="<?= site_url('/products') ?>">Back</a>




<?= $this->endSection(); ?>