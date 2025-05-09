<script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>



<div class="grid grid-cols-1 lg:grid-cols-3 gap-4 px-4 sm:px-6 py-6">

  <div class="lg:col-span-2 bg-white p-4 sm:p-6 rounded-lg shadow-lg">
    <h3 class="text-2xl font-semibold text-gray-800 mb-4">Berita Terbaru</h3>
    <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 gap-4">
      <!-- Card -->
      <div class="bg-blue-100 p-4 rounded-lg shadow-lg flex flex-col">
        <?php if ($beritaByCategory): ?>
          <?php foreach ($beritaByCategory as $item): ?>

            <img src="/assets/images/berita1.jpg" alt="Spiral Design" class="w-full h-48 sm:h-40 object-cover rounded-lg shadow">
            <h4 class="text-lg font-semibold text-gray-800 mt-3 mb-2"><?php $item['title'] ?></h4>
            <p class="text-gray-600 text-sm">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Faucibus in libero risus semper habitant arcu eget.</p>

          <?php endforeach; ?>
        <?php else: ?>
          <p class="text-gray-600">Tidak ada berita untuk kategori ini.</p>
        <?php endif; ?>
      </div>
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




<div class="bg-blue-100 p-4 sm:p-6 rounded-lg shadow-lg mt-10">
  <h2 class="text-2xl font-bold mb-4">Berita Berdasarkan Kategori</h2>
  <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
    <?php if ($beritaByCategory): ?>
      <?php foreach ($beritaByCategory as $item): ?>
        <div class="bg-white p-6 rounded-lg shadow-lg">
          <h3 class="text-xl font-semibold text-gray-800 mb-2"><?= $item['title'] ?></h3>
          <p class="text-gray-600 text-sm sm:text-base"><?= substr(strip_tags($item['content']), 0, 100) ?>...</p>
        </div>
        <!-- </a> -->
      <?php endforeach; ?>
    <?php else: ?>
      <p class="text-gray-600">Tidak ada berita untuk kategori ini.</p>
    <?php endif; ?>
  </div>
</div>
