<?php $title = $title ?? 'Create Article'; include(APPPATH.'Views/layouts/header.php'); ?>
<div class="container mt-4">
  <div class="card shadow">
    <div class="card-header bg-primary text-white">
      <h5 class="mb-0">Create New Article</h5>
    </div>
    <div class="card-body">
      <form action="<?= site_url('articles/store') ?>" method="post">
        <?= csrf_field() ?>
        

        <div class="mb-3">
          <label for="title" class="form-label">Title</label>
          <input type="text" name="title" class="form-control <?= session('errors.title') ? 'is-invalid' : '' ?>" value="<?= old('title') ?>" required>
          <div class="invalid-feedback"><?= session('errors.title') ?></div>
        </div>
<div class="mb-3">
  <label for="status">Status</label>
  <select name="status" class="form-select" required>
    <option value="draft" <?= old('status') === 'draft' ? 'selected' : '' ?>>Draft</option>
    <option value="published" <?= old('status') === 'published' ? 'selected' : '' ?>>Published</option>
  </select>
</div>

        <div class="mb-3">
  <label for="content" class="form-label">Content</label>
  <textarea id="summernote" name="content" rows="6" class="form-control <?= session('errors.content') ? 'is-invalid' : '' ?>" required><?= old('content') ?></textarea>
  <div class="invalid-feedback"><?= session('errors.content') ?></div>
</div>


        <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Save Article</button>
        <a href="<?= site_url('dashboard') ?>" class="btn btn-secondary">Cancel</a>
      </form>
    </div>
  </div>
</div>
<?php include(APPPATH.'Views/layouts/footer.php'); ?>
