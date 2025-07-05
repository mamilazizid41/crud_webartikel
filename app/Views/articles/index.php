<?php $title = $title ?? 'Dashboard'; include(APPPATH . 'Views/layouts/header.php'); ?>

<div class="container mt-4">
    
  <!-- Top Section -->
   <?php if (session()->getFlashdata('success')): ?>
<script>
  Swal.fire({
    icon: 'success',
    title: 'Success',
    text: '<?= esc(session()->getFlashdata('success')) ?>',
    confirmButtonColor: '#3085d6',
    confirmButtonText: 'OK'
  });
</script>
<?php endif; ?>
<?php if (session()->getFlashdata('error')): ?>
<script>
  Swal.fire({
    icon: 'error',
    title: 'Oops...',
    text: '<?= esc(session()->getFlashdata('error')) ?>'
  });
</script>
<?php endif; ?>

    <div class="row mb-4">
  <div class="col-md-6">
    <div class="card text-white bg-primary shadow-sm">
      <div class="card-body">
        <h5 class="card-title"><i class="fas fa-newspaper me-2"></i>Total Articles</h5>
        <p class="card-text display-6"><?= esc($totalArticles) ?></p>
      </div>
    </div>
  </div>
  <div class="col-md-6">
    <div class="card text-white bg-success shadow-sm">
      <div class="card-body">
        <h5 class="card-title"><i class="fas fa-comments me-2"></i>Total Feedback</h5>
        <p class="card-text display-6"><?= esc($totalFeedback) ?></p>
      </div>
    </div>
  </div>
</div>


  <div class="d-flex justify-content-between align-items-center mb-3 border-bottom pb-2">
    <h2><i class="fas fa-chart-bar me-2"></i>Article Dashboard</h2>
    <a href="<?= site_url('articles/create') ?>" class="btn btn-primary">
      <i class="fas fa-plus"></i> New Article
    </a>
  </div>

  <!-- Articles Table -->
  <div class="card shadow-sm">
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-hover align-middle">
          <thead class="table-dark">
            <tr>
              <th>#</th>
              <th>Status</th>
              <th>Title</th>
              <th>Created At</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            <?php $i = 1 + ($pager->getCurrentPage('articles') - 1) * $pager->getPerPage('articles');
 foreach ($articles as $article): ?>
              <tr>
                <td><?= $i++ ?></td>
                <td><span class="badge <?= $article['status'] === 'draft' ? 'bg-secondary' : 'bg-success' ?>">
  <?= ucfirst($article['status']) ?>
</span></td>
                <td><?= esc($article['title']) ?></td>
                <td><?= date('M d, Y H:i', strtotime($article['created_at'])) ?></td>
                <td>
                  <a href="<?= site_url('articles/edit/' . $article['id']) ?>" class="btn btn-sm btn-warning me-1">
                    <i class="fas fa-edit"></i> Edit
                  </a>
                  <form action="<?= site_url('articles/delete/' . $article['id']) ?>" method="post" class="d-inline delete-form">
                    <?= csrf_field() ?>
                    <input type="hidden" name="_method" value="DELETE">
                    <button type="button" class="btn btn-sm btn-danger btn-delete">
                        <i class="fas fa-trash"></i> Delete
                    </button>
                </form>

                </td>
              </tr>
            <?php endforeach; ?>
            <?php if (empty($articles)): ?>
              <tr>
                <td colspan="4" class="text-muted text-center">No articles found.</td>
              </tr>
            <?php endif; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
<?php if ($pager->getPageCount('articles') > 1): ?>
  <div class="mt-4 d-flex justify-content-center">
    <?= $pager->links('articles', 'bootstrap') ?>
  </div>
<?php endif; ?>
<script>
  document.querySelectorAll('.btn-delete').forEach(button => {
    button.addEventListener('click', function () {
      const form = this.closest('form');
      Swal.fire({
        title: 'Are you sure?',
        text: "This action cannot be undone!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#6c757d',
        confirmButtonText: 'Yes, delete it!',
        cancelButtonText: 'Cancel'
      }).then((result) => {
        if (result.isConfirmed) {
          form.submit();
        }
      });
    });
  });
</script>
<?php include(APPPATH . 'Views/layouts/footer.php'); ?>
