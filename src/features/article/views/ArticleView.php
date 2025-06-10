<?php ob_start(); ?>

<div class="container mx-auto max-w-6xl px-6 py-10">
  <div class="flex flex-row gap-8">
    <!-- Left Column: Search and Articles -->
    <div class="w-2/3">
      <!-- Search Bar -->
      <div class="mb-8">
        <form action="/search" method="GET" class="flex">
          <input type="text" name="q" placeholder="Search articles..." class="w-full px-4 py-2 border rounded-l-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
          <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-r-lg hover:bg-blue-700">Search</button>
        </form>
      </div>

      <!-- Articles -->
      <?php foreach ($articles as $item): ?>
        <article class="bg-white shadow-lg rounded-xl p-6 mb-8">
          <header class="mb-4">
            <h1 class="text-3xl font-bold text-gray-800 mb-2"><?= htmlspecialchars($item['title']); ?></h1>
            <div class="text-sm text-gray-500">
              <span><?= htmlspecialchars($item['nickname']); ?></span> •
              <span><?= htmlspecialchars($item['date']); ?></span> •
              <span><?= htmlspecialchars($item['category_name']); ?></span>
            </div>
          </header>
          <div class="mb-4">
            <img src="<?= htmlspecialchars("/uploads/" . $item['picture']); ?>" alt="Image" class="w-full h-64 object-cover rounded-lg shadow-md hover:scale-105 transition-transform">
          </div>
          <div class="text-lg text-gray-700 leading-relaxed space-y-4">
            <?php
            $content = $item['content'];
            $content = preg_replace("/<p>/", "<p class='text-lg leading-relaxed text-gray-800 mb-4'>", $content);
            $content = preg_replace("/<h1>/", "<h1 class='text-2xl text-gray-900 font-bold mt-6'>", $content);
            $content = preg_replace("/<a>/", "<a class='text-blue-600 hover:text-blue-800'>", $content);
            $content = preg_replace("/<ul>/", "<ul class='list-disc pl-6'>", $content);
            $content = preg_replace("/<li>/", "<li class='mb-2'>", $content);
            echo $content;
            ?>
          </div>
        </article>
      <?php endforeach; ?>
    </div>

    <!-- Right Column: Related Articles -->
    <div class="w-1/3">
      <aside class="bg-gray-50 p-6 rounded-xl shadow-lg">
        <h2 class="text-2xl font-bold text-gray-800 mb-4">Related Articles</h2>
        <?php if (!empty($relatedArticles)): ?>
          <ul class="space-y-4">
            <?php foreach ($relatedArticles as $related): ?>
              <li>
                <a href="/article/<?= htmlspecialchars($related['id']); ?>" class="block">
                  <div class="flex items-center space-x-4">
                    <img src="<?= htmlspecialchars("/uploads/" . $related['picture']); ?>" alt="Related Image" class="w-16 h-16 object-cover rounded-md">
                    <div>
                      <h3 class="text-lg font-semibold text-gray-800 hover:text-blue-600"><?= htmlspecialchars($related['title']); ?></h3>
                      <p class="text-sm text-gray-500"><?= htmlspecialchars($related['category_name']); ?></p>
                    </div>
                  </div>
                </a>
              </li>
            <?php endforeach; ?>
          </ul>
        <?php else: ?>
          <p class="text-gray-500">No related articles found.</p>
        <?php endif; ?>
      </aside>
    </div>
  </div>
</div>

<footer class="mt-10 text-center text-gray-500">
  <p>© 2025 UIN Maulana Malik Ibrahim Malang</p>
</footer>

<?php $content = ob_get_clean(); ?>
<?php require __DIR__ . '/../../../main.php'; ?>
