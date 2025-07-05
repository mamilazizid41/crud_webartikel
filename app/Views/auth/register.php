<?php $title = 'Register'; include(APPPATH.'Views/layouts/header.php'); ?>
<h2>Register</h2>
<?php if (session()->getFlashdata('error')): ?>
    <div class="alert alert-danger"> <?= session()->getFlashdata('error') ?> </div>
<?php endif; ?>
<form method="post" action="<?= site_url('register') ?>">
    <div class="mb-3">
        <label>Username</label>
        <input type="text" name="username" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Password</label>
        <input type="password" name="password" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Confirm Password</label>
        <input type="password" name="pass_confirm" class="form-control" required>
    </div>
    <button class="btn btn-success">Sign Up</button>
</form>
<p class="mt-3">Already have an account? <a href="<?= site_url('login') ?>">Login</a></p>
<?php include(APPPATH.'Views/layouts/footer.php'); ?>