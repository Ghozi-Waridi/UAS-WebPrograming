<?php ob_start(); ?>

<div class="container mx-auto px-4 flex justify-center items-center mt-10">
  <div class="w-full max-w-6xl">
    <div class="text-center">
      <h1 class="text-4xl font-bold text-gray-900 mb-4">Kategori Berita</h1>
      <p class="text-gray-700 text-lg mb-8">Pilih kategori untuk melihat berita terkait.</p>
    </div>
    <div class="bg-white p-6 sm:p-10 rounded-xl shadow-xl mt-10">
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
        <?php foreach ($category as $item): ?>
          <a href="/kategori/<?= urlencode($item['name']) ?>" class="transition-transform transform hover:scale-105">
            <div class="bg-gradient-to-r from-blue-100 to-blue-200 p-8 rounded-lg shadow-lg hover:shadow-2xl">
              <h3 class="text-2xl font-semibold text-gray-800 text-center"><?= $item['name'] ?></h3>
            </div>
          </a>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
</div>

<?php $categorybanyak = ob_get_clean(); ?>
<?php require __DIR__ . '/../../../main.php'; ?>
