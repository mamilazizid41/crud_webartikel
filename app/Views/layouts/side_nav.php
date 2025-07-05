<?php
  $uri = service('uri');
  $current = $uri->getSegment(1); // login, register, articles, etc.
?>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="<?= site_url('/') ?>">My Articles</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <?php if (session()->get('logged_in')): ?>
          <li class="nav-item">
            <a class="nav-link" href="<?= site_url('dashboard') ?>">Dashboard</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= site_url('feedback') ?>">Feedback</a>
          </li>
          <li class="nav-item">
  <a class="nav-link" href="<?= site_url('logout') ?>">
    <i class="fas fa-sign-out-alt"></i> Logout
  </a>
</li>

        <?php else: ?>
          <li class="nav-item">
            <a class="nav-link" href="<?= site_url('login') ?>">Login</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= site_url('register') ?>">Sign Up</a>
          </li>
        <?php endif; ?>
      </ul>
    </div>
  </div>
</nav>

<div class="container-fluid">
    <div class="row">
        
        <?php if (!in_array($current, ['login', 'register'])): ?>
<nav class="col-md-2 d-none d-md-block sidebar">
    <div class="position-sticky">
        <?= view_cell(\App\Cells\LatestArticles::class . '::display') ?>
    </div>
</nav>
<?php endif; ?>

        
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 pt-4">
