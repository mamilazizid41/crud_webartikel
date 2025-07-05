<?php
$title = $title ?? 'My Articles';
include(APPPATH . 'Views/layouts/header.php');

// Load CodeIgniter's text helper for character_limiter
helper('text');
?>

<div class="container mt-4">
  <h1 class="mb-4">All Articles</h1>

  <?php foreach ($articles as $article): ?>
    <div class="card mb-3 shadow-sm">
      <div class="card-body">
        <h5 class="card-title"><?= esc($article['title']) ?></h5>
        <p class="card-text">
          <?= esc(character_limiter(strip_tags($article['content']), 50)) ?>
        </p>
        <a href="<?= site_url('articles/read/' . $article['id']) ?>" class="btn btn-sm btn-outline-primary">
          Read More
        </a>
      </div>
    </div>
  <?php endforeach; ?>
  
</div>
<div class="d-flex justify-content-center mt-4">
    <?= $pager->links('default', 'bootstrap') ?>

</div>


<?php include(APPPATH . 'Views/layouts/footer.php'); ?>
