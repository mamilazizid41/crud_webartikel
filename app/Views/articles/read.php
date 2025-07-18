<?php $title = $title ?? 'Read Article'; include(APPPATH.'Views/layouts/header.php'); ?>

<div class="container mt-4">
  <div class="card mb-4 shadow">
    <div class="card-body">
      <h2 class="card-title"><?= esc($article['title']) ?></h2>
      <small class="text-muted">
        Published on <?= date('F j, Y \a\t H:i', strtotime($article['created_at'])) ?>
    </small>
      <hr>
      <!-- Display HTML content safely (no escaping) -->
      <div class="card-text">
        <?= $article['content'] ?>
      </div>
    </div>
  </div>

 <hr>
<h5>Leave Feedback</h5>
<div class="card shadow-sm mb-4" style="max-width: 600px;">
    <div class="card-body">
        <form method="post" action="<?= site_url('feedback/store/'.$article['id']) ?>">
            <div class="mb-3">
                <label class="form-label">Your Name</label>
                <input type="text" name="name" class="form-control form-control-sm" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Your Email</label>
                <input type="email" name="email" class="form-control form-control-sm" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Your Feedback</label>
                <textarea name="comment" class="form-control form-control-sm" rows="3" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary btn-sm">
                Submit
            </button>
        </form>
    </div>
</div>

  </div>
  <?php if (session()->getFlashdata('errors')): ?>
  <div class="alert alert-danger">
    <ul class="mb-0">
      <?php foreach (session()->getFlashdata('errors') as $error): ?>
        <li><?= esc($error) ?></li>
      <?php endforeach; ?>
    </ul>
  </div>
<?php endif; ?>


  <!-- Feedback List -->
  <div class="card">
    <div class="card-header bg-secondary text-white">Feedback</div>
    <ul class="list-group list-group-flush">
      <?php if (!empty($feedback)): ?>
        <?php foreach ($feedback as $item): ?>
          <li class="list-group-item">
            <strong><?= esc($item['name']) ?>:</strong>
            <div><?= esc($item['comment']) ?></div>
            <small class="text-muted"><?= date('M d, Y H:i', strtotime($item['created_at'])) ?></small>
          </li>
        <?php endforeach; ?>
      <?php else: ?>
        <li class="list-group-item text-muted">No feedback yet.</li>
      <?php endif; ?>
    </ul>
  </div>
</div>

<?php include(APPPATH.'Views/layouts/footer.php'); ?>
