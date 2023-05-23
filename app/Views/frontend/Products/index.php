<?= $this->extend('layouts/default'); ?>

<?= $this->section('title'); ?>Products <?= $this->endSection(); ?>


<?= $this->section('content'); ?>




<a href=<?= site_url('/products/new') ?>>
  New Task
</a>

<?php if($products): ?>

<ul>
  <?php foreach($products as $item): ?>
  <li>

    <a href="<?= site_url('/products/' . $item->pretty_url) ?>">
      <?=  esc($item->name) ?>
    </a>
    <a href="<?= site_url('/products/edit/' . $item->pretty_url) ?>">Edit</a>
    <a href="<?= site_url('/products/delete/' . $item->pretty_url) ?>">Delete</a>

  </li>

  <?php endforeach ?>
</ul>

<!-- links method on pager object to display more than paginated -->
<!-- autgenerated can be stylized -->
<!-- <
  ?php $pager->links() ?> -->

<!-- this divides on newer and older, text can be changed - files in pager.php -->
<!-- <?php
//  $pager->simpleLinks()
 ?> -->



<?php else: ?>

<!-- <p>You don't have any tasks</p> -->

<?php endif; ?>





<?= $this->endSection(); ?>