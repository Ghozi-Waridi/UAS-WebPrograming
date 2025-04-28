<?php

use PhpParser\Node\Stmt\Foreach_;

ob_start(); ?>
<div class="container mx-auto px-4">

  <!-- Hero Section -->
  <div class="flex flex-col-reverse md:flex-row items-center justify-between px-6 py-10 md:py-20 gap-10">
    <div class="w-full md:w-1/2">
      <h1 class="text-3xl sm:text-4xl font-bold text-gray-900 mb-4">New designs</h1>
      <h2 class="text-2xl sm:text-4xl font-semibold text-gray-900 mb-4">New inspirations</h2>
      <p class="text-base sm:text-lg text-gray-600 mb-6">
        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Faucibus in libero risus semper habitant arcu
        eget. Et integer facilisi eget diam.
      </p>
      <a href="#"
        class="inline-block px-6 py-3 bg-indigo-600 text-white text-base sm:text-lg font-semibold rounded-full hover:bg-indigo-700 transition">
        Explore
      </a>
    </div>
    <div class="w-full md:w-1/2">
      <img src="/assets/images/berita1.jpg" alt="Spiral Design"
        class="w-full h-auto rounded-lg shadow-lg object-cover">
    </div>
  </div>

  <!-- Grid Cards Section -->
  <div class="bg-blue-100 p-4 sm:p-6 rounded-lg shadow-lg mt-10">
    <h2 class="text-2xl font-bold mb-4">Populer Hari Ini</h2>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
      <?php foreach ($berita as $item): ?>
        <a href="/detail/<?= $item['id'] ?>">
          <div class="bg-white p-6 rounded-lg shadow-lg">
            <h3 class="text-xl font-semibold text-gray-800 mb-2"><?= $item['title'] ?></h3>
            <p class="text-gray-600 text-sm sm:text-base"><?= substr(strip_tags($item['content']), 0, 100) ?>...</p>
          </div>
        </a>
      <?php endforeach; ?>
    </div>
  </div>


  <!-- Footer Navigation -->
  <div class="bg-white shadow-lg rounded-lg mt-10 mb-10">
    <div class="flex flex-wrap justify-center sm:justify-between items-center px-6 py-4 space-x-4 sm:space-x-6">


      <form action="/" method="POST">
        <input type="submit" name="category" value="all" class=" hover:text-white px-4 py-2 rounded-lg hover:bg-blue-600">
        <?php foreach ($category2 as $item): ?>
          <input type="submit" name="category" value="<?= $item['name'] ?>" class=" hover:text-white px-4 py-2 rounded-lg hover:bg-blue-600">
        <?php endforeach; ?>
      </form>
    </div>
  </div>



  <div class="grid grid-cols-1 lg:grid-cols-3 gap-4 px-4 sm:px-6 py-6">

    <div class="lg:col-span-2 bg-white p-4 sm:p-6 rounded-lg shadow-lg">
      <h3 class="text-2xl font-semibold text-gray-800 mb-4">Berita Terbaru</h3>
      <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 gap-4">


        <?php if ($beritaByCategory): ?>
          <?php foreach ($beritaByCategory as $item): ?>
            <a href="/detail/<?= $item['id'] ?>">
              <div class="bg-blue-100 p-4 rounded-lg shadow-lg flex flex-col">
                <img src="/uploads/<?= $item['picture'] ?>" alt="Spiral Design" class="w-full h-48 sm:h-40 object-cover rounded-lg shadow">
                <h4 class="text-xl font-semibold text-gray-800 mb-2"><?= $item['title'] ?></h4>
                <p class="text-gray-600 text-sm sm:text-base"><?= substr(strip_tags($item['content']), 0, 50) ?>...</p>
              </div>
            </a>
          <?php endforeach; ?>

        <?php else: ?>
          <p class="text-gray-600">Tidak ada berita untuk kategori ini.</p>
        <?php endif; ?>

      </div>
    </div>

    <!-- Terpopuler -->
    <div class="bg-white p-4 sm:p-6 rounded-lg shadow-lg">
      <h3 class="text-2xl font-semibold text-gray-800 mb-4">Terpopuler</h3>

      <div class="space-y-4">
        <div class="flex items-start space-x-3">
          <img src="/assets/images/berita3.jpg" alt="Spiral Design" class="w-20 h-20 object-cover rounded-lg shadow">
          <p class="text-sm font-medium text-gray-800">Top 3 Sports: Rivan Istimewa di Liga Jepang, Onana Cetak Gol</p>
        </div>
      </div>
    </div>
  </div>

</div>
<?php $home = ob_get_clean(); ?>
<?php require __DIR__ . '/../../../main.php'; ?>
