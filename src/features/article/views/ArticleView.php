<?php ob_start(); ?>

<?php foreach ($article as $item): ?>

  <article class="container mx-auto max-w-4xl px-6 py-10 bg-white shadow-lg rounded-xl mt-10">
    <header class="mb-6">

      <h1 class="text-4xl font-bold text-gray-800 tracking-wide mb-2"><?= htmlspecialchars($item['title']); ?></h1>

      <div class="text-sm text-gray-500 mb-4">
        <span><?= htmlspecialchars($item['nickname']); ?></span> •
        <span><?= htmlspecialchars($item['date']); ?></span> •
        <span><?= htmlspecialchars($item['category_name']); ?></span>
      </div>
    </header>


    <div class="mb-6">
      <img src="<?= htmlspecialchars("/uploads/" . $item['picture']); ?>" alt="Image" class="w-full h-96 object-cover rounded-lg shadow-lg transition-transform transform hover:scale-105 hover:shadow-2xl">
    </div>
    <div class="text-lg text-gray-700 leading-relaxed space-y-4">
      <?php
      $content = $item['content'];
      $content = preg_replace("/<p>/", "<p class='text-lg leading-relaxed text-gray-800 mb-4'>", $content);
      $content = preg_replace("/<h1>/", "<h1 class='text-3xl text-gray-900 font-bold mt-6'>", $content);
      $content = preg_replace("/<a>/", "<a class='text-blue-600 hover:text-blue-800'>", $content);
      $content = preg_replace("/<ul>/", "<ul class='list-disc pl-6'>", $content);
      $content = preg_replace("/<li>/", "<li class='mb-2'>", $content);
      echo $item['content']; ?>
    </div>

    <footer class="mt-10 text-center text-gray-500">
      <p>&copy; 2025 UIN Maulana Malik Ibrahim Malang</p>
    </footer>
  </article>

<?php endforeach; ?>

<?php $content = ob_get_clean(); ?>
<?php require __DIR__ . '/../../../main.php'; ?>
