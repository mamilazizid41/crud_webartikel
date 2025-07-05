<?php if (count($pager->links()) > 1): ?>
<nav aria-label="Page navigation">
  <ul class="pagination justify-content-center">

    <!-- First Page -->
    <?php if ($pager->hasPrevious()): ?>
      <li class="page-item">
        <a class="page-link" href="<?= $pager->getFirst() ?>" aria-label="First">
          &laquo;
        </a>
      </li>
    <?php endif; ?>

    <!-- Page Number Links -->
    <?php foreach ($pager->links() as $link): ?>
      <li class="page-item <?= $link['active'] ? 'active' : '' ?>">
        <a class="page-link" href="<?= $link['uri'] ?>"><?= $link['title'] ?></a>
      </li>
    <?php endforeach; ?>

    <!-- Last Page -->
    <?php if ($pager->hasNext()): ?>
      <li class="page-item">
        <a class="page-link" href="<?= $pager->getLast() ?>" aria-label="Last">
          &raquo;
        </a>
      </li>
    <?php endif; ?>

  </ul>
</nav>
<?php endif; ?>
