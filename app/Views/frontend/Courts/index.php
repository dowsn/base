<?= $this->extend('layouts/default'); ?>

<?= $this->section('title'); ?>Courts <?= $this->endSection(); ?>


<?= $this->section('content'); ?>




<a href=<?= site_url('/courts/new') ?>>
  New Court
</a>

<?php if($courts): ?>

<ul>
  <?php foreach($court as $c): ?>
  <li>

    <a href="<?= site_url('/court/' . $c->pretty_url) ?>">
      <?=  esc($c->name) ?>
    </a>
    <a href="<?= site_url('/courts/edit/' . $c->pretty_url) ?>">Edit</a>
    <a href="<?= site_url('/courts/delete/' . $c->pretty_url) ?>">Delete</a>

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