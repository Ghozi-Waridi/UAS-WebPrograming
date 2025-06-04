<?php ob_start(); ?>

<div class="container mx-auto px-4 flex justify-center items-center mt-10">
  <div class="w-full max-w-6xl">
    <!-- Articles Section -->
    <div class="bg-white p-6 sm:p-10 rounded-xl shadow-xl mt-10">
      <div class="space-y-8">
        <?php if (empty($articles)): ?>
          <p class="text-center text-gray-600">Tidak ada artikel untuk ditampilkan.</p>
        <?php else: ?>
          <?php foreach ($articles as $item): ?>
            <a href="/detail/<?= $item['id'] ?>" class="transition-transform transform hover:scale-105">
              <div class="mb-3 flex bg-white p-6 rounded-lg shadow-lg hover:shadow-2xl transition duration-300">
                <img src="/Uploads/<?= $item['picture'] ?>" alt="<?= $item['title'] ?>" class="w-20 h-20 object-cover rounded-lg mr-6">
                <div class="flex flex-col justify-between">
                  <h4 class="text-2xl font-semibold text-gray-800 mb-2"><?= $item['title'] ?></h4>
                  <p class="text-gray-600 text-base"><?= substr(strip_tags($item['content']), 0, 100) ?>...</p>
                  <div class="mt-4 text-blue-600 hover:text-blue-800">Read more</div>
                </div>
              </div>
            </a>
          <?php endforeach; ?>
        <?php endif; ?>
      </div>

      <!-- Pagination Buttons -->
      <!-- <?php if ($totalPages > 1): ?> -->
      <!--   <div class="mt-8 flex justify-center space-x-2"> -->
      <!--     <?php for ($i = 1; $i <= $totalPages; $i++): ?> -->
      <!--       <a href="/kategori/<?= urlencode($categoryName) ?>/<?= $i ?>" -->
      <!--         class="px-4 py-2 rounded-lg <?= $i === $currentPage ? 'bg-blue-600 text-white' : 'bg-gray-200 text-gray-800 hover:bg-gray-300' ?> transition duration-200"> -->
      <!--         <?= $i ?> -->
      <!--       </a> -->
      <!--     <?php endfor; ?> -->
      <!--   </div> -->
      <!-- <?php endif; ?> -->
    </div>
  </div>
</div>

<?php $articleDetailCategory = ob_get_clean(); ?>
<?php require __DIR__ . '/../../../main.php'; ?>
