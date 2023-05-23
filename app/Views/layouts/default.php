<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $this->renderSection('title') ?>
  </title>
</head>

<body>

  <!-- main menu -->
  <a href="<?= site_url("/") ?>">Home</a>
  <a href="<?= site_url("/courts") ?>">Courts</a>


  <!-- WEINKUNSTTREFF

  WEINGARTEN

  WEINKELLER

  GALERIE

  ÜBERNACHTUNG

  KONTAKT -->



  <?php
  // if(
   // using the helper that was added here via controller
    // current_user()): ?>
  <!-- // this would be directly but I can do it through helper that uses library
    // session()->has('user_id') -->



  <!-- // echoes user -->
  <!-- <p> Hello,
  // esc(current_user()->name);

  <!-- <a href="<?= site_url('/logout') ?>">Log out</a> -->
  <!-- <?php
  //  else:
    ?> -->
  <!-- <a href="<?= site_url("/signup") ?>">Sign up</a> -->
  <!-- <a href="<?= site_url("/login") ?>">Login</a> -->

  <?php
// endif;
?>



  <?php if(session()->has('warning')): ?>
  <!-- class for different styling, we put those here because this way they can be on all pages, I just check if I get it -->
  <div class='warning'><?= session('warning') ?></div>
  <?php endif ?>


  <!-- those are just flash messages for session and they disappear after reloading -->
  <?php if(session()->has('info')): ?>
  <div class='info'><?= session('info') ?></div>
  <?php endif ?>

  <!-- for csrf token error after submitting invalid token-->
  <?php if(session()->has('error')): ?>
  <div class='info'><?= session('error') ?></div>
  <?php endif ?>


  <?= $this->renderSection('content') ?>

</body>

</html>