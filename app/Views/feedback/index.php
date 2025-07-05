<?php $title = $title ?? 'My Articles'; include(APPPATH.'Views/layouts/header.php'); ?>
<h2>All Feedback</h2>
<table class="table table-bordered">
    <thead class="table-dark">
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Email</th>
            <th>Comment</th>
            <th>Article</th>
        </tr>
    </thead>
    <tbody>
        <?php $i=1; foreach ($feedback as $item): ?>
        <tr>
            <td><?= $i++ ?></td>
            <td><?= esc($item['name']) ?></td>
            <td><?= esc($item['email']) ?></td>
            <td><?= esc($item['comment']) ?></td>
            <td><?= esc($item['article_title']) ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?php include(APPPATH.'Views/layouts/footer.php'); ?>
