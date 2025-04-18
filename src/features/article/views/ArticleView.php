
<?php ob_start(); ?>

<?php foreach ($article as $item): ?>
  <header>
    <h1><?= htmlspecialchars($item['title']) ?></h1>
    <h5><?= htmlspecialchars($item['nickname']) ?></h5>
    <h6><?= htmlspecialchars($item['date']) ?></h6>
    <h6><?= htmlspecialchars($item['category_name']) ?></h6>
  </header>
  <article>
    <div class="content">
      <img src=<?php echo htmlspecialchars("/uploads/" . $item['picture']); ?> alt="Not Image">
    <?php echo $item['content']; ?>
    </div>
  </article>
  <footer>
    <p>&copy; 2025 UIN Maulana Malik Ibrahim Malang</p>
  </footer>
<?php endforeach; ?>

<?php $content = ob_get_clean(); ?>
<?php require __DIR__ . '/../../../main.php'; ?>
