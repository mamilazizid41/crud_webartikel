<?php $title = 'Login'; include(APPPATH.'Views/layouts/header.php'); ?>
<h2>Login</h2>
<?php if (session()->getFlashdata('error')): ?>
    <div class="alert alert-danger"> <?= session()->getFlashdata('error') ?> </div>
<?php endif; ?>
<form method="post" action="<?= site_url('login') ?>">
    <div class="mb-3">
        <label>Username</label>
        <input type="text" name="username" class="form-control">
    </div>
    <div class="mb-3">
        <label>Password</label>
        <input type="password" name="password" class="form-control">
    </div>
    <button class="btn btn-primary">Login</button>
</form>
<p class="mt-3">Don't have an account? <a href="<?= site_url('register') ?>">Sign Up</a></p>
<?php include(APPPATH.'Views/layouts/footer.php'); ?>