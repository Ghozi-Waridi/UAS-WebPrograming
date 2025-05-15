<?php

use PhpParser\Node\Stmt\Foreach_;

ob_start(); ?>
<div class="container mx-auto px-4">

  <!-- Hero Section -->
  <div class="relative w-full max-w-6xl mx-auto">
    <!-- Carousel Container -->
    <div class="overflow-hidden relative h-auto min-h-[400px]">
      <div class="carousel flex transition-transform duration-500 ease-in-out">
        <?php foreach ($beritaCarousel as $item): ?>
          <div class="carousel-item min-w-full px-6 py-10">
            <div class="flex flex-col-reverse md:flex-row items-center justify-between px-6 py-10 md:py-20 gap-10">
              <div class="w-full md:w-1/2">
                <h3 class="text-xl font-semibold text-gray-800 mb-2"><?= $item['title'] ?></h3>

                <p class="text-base sm:text-lg text-gray-600 mb-6"><?= substr(strip_tags($item['content']), 0, 100) ?>...</p>

                <a href="/detail/<?= $item['id'] ?>" class="inline-block px-6 py-3 bg-indigo-600 text-white text-base sm:text-lg font-semibold rounded-full hover:bg-indigo-700 transition">
                  Explore
                </a>
              </div>
              <div class="w-full md:w-1/2">
                <img src="/uploads/<?= $item['picture'] ?>" alt="Spiral Design"
                  class="w-full h-auto rounded-lg shadow-lg object-cover">
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
    <!-- Navigation Buttons -->
    <button class="prev absolute top-1/2 left-4 transform -translate-y-1/2 bg-white bg-opacity-50 p-2 rounded-full hover:bg-opacity-75">
      <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
      </svg>
    </button>
    <button class="next absolute top-1/2 right-4 transform -translate-y-1/2 bg-white bg-opacity-50 p-2 rounded-full hover:bg-opacity-75">
      <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
      </svg>
    </button>
    <!-- Dots Indicator -->
    <div class="absolute bottom-4 left-1/2 transform -translate-x-1/2 flex space-x-2">
      <span class="dot w-3 h-3 bg-white bg-opacity-50 rounded-full cursor-pointer"></span>
      <span class="dot w-3 h-3 bg-white bg-opacity-50 rounded-full cursor-pointer"></span>
      <span class="dot w-3 h-3 bg-white bg-opacity-50 rounded-full cursor-pointer"></span>
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

    <div class="lg:col-span-3 bg-white p-4 sm:p-6 rounded-lg shadow-lg">
      <h3 class="text-2xl font-semibold text-gray-800 mb-4">Berita Terbaru</h3>
      <div class="grid grid-cols-1 sm:grid-cols-3 xl:grid-cols-3 gap-4">


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
    <!-- <div class="bg-white p-4 sm:p-6 rounded-lg shadow-lg"> -->
    <!--   <h3 class="text-2xl font-semibold text-gray-800 mb-4">Terpopuler</h3> -->
    <!---->
    <!--   <div class="space-y-4"> -->
    <!--     <div class="flex items-start space-x-3"> -->
    <!--       <img src="/assets/images/berita3.jpg" alt="Spiral Design" class="w-20 h-20 object-cover rounded-lg shadow"> -->
    <!--       <p class="text-sm font-medium text-gray-800">Top 3 Sports: Rivan Istimewa di Liga Jepang, Onana Cetak Gol</p> -->
    <!--     </div> -->
    <!--   </div> -->
    <!-- </div> -->
  </div>

</div>


<script>
  const carousel = document.querySelector('.carousel');
  const items = document.querySelectorAll('.carousel-item');
  const prevButton = document.querySelector('.prev');
  const nextButton = document.querySelector('.next');
  const dots = document.querySelectorAll('.dot');
  let currentIndex = 0;
  let autoSlideInterval;

  function updateCarousel() {
    carousel.style.transform = `translateX(-${currentIndex * 100}%)`;
    dots.forEach((dot, index) => {
      dot.classList.toggle('bg-opacity-100', index === currentIndex);
      dot.classList.toggle('bg-opacity-50', index !== currentIndex);
    });
  }

  function startAutoSlide() {
    autoSlideInterval = setInterval(() => {
      currentIndex = (currentIndex + 1) % items.length;
      updateCarousel();
    }, 3000); // Change slide every 3 seconds
  }

  function stopAutoSlide() {
    clearInterval(autoSlideInterval);
  }

  prevButton.addEventListener('click', () => {
    stopAutoSlide();
    currentIndex = (currentIndex - 1 + items.length) % items.length;
    updateCarousel();
    startAutoSlide();
  });

  nextButton.addEventListener('click', () => {
    stopAutoSlide();
    currentIndex = (currentIndex + 1) % items.length;
    updateCarousel();
    startAutoSlide();
  });

  dots.forEach((dot, index) => {
    dot.addEventListener('click', () => {
      stopAutoSlide();
      currentIndex = index;
      updateCarousel();
      startAutoSlide();
    });
  });

  updateCarousel();
  startAutoSlide();
</script>
<?php $home = ob_get_clean(); ?>
<?php require __DIR__ . '/../../../main.php'; ?>
