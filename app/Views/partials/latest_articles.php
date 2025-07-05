<?php if (!empty($latestArticles)): ?>
  <div class="card mb-4 shadow-sm">
    <div class="card-header bg-primary text-white fw-bold">
      Latest Articles
    </div>
    <ul class="list-group list-group-flush">
      <?php foreach ($latestArticles as $article): ?>
        <li class="list-group-item d-flex justify-content-between align-items-center">
          <a href="<?= site_url('articles/read/' . $article['id']) ?>" class="text-decoration-none text-dark">
            <?= esc(strlen($article['title']) > 30 ? substr($article['title'], 0, 30) . '...' : $article['title']) ?>
          </a>
          <span class="badge bg-light text-muted small"><?= date('M d', strtotime($article['created_at'])) ?></span>
        </li>
      <?php endforeach; ?>
    </ul>
  </div>
<?php endif; ?>
