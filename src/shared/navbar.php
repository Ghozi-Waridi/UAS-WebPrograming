<?php ob_start(); ?>
  <header class="bg-white shadow-md py-4">
    <div class="container mx-auto flex justify-between items-center px-6">
      <div class="text-2xl font-bold text-gray-800">
        <a href="#" class="text-gray-900 hover:text-indigo-600">NusantaraIN</a>
      </div>
      <nav class="space-x-6">
        <a href="#" class="text-gray-600 hover:text-indigo-300 hover:bg-blue-200 p-3 rounded-lg">Beranda</a>
        <a href="#" class="text-gray-600 hover:text-indigo-300 hover:bg-blue-200 p-3 rounded-lg">Kategori</a>
        <a href="#" class="text-gray-600 hover:text-indigo-300 hover:bg-blue-200 p-3 rounded-lg">Tentang</a>
        <a href="#" class="text-gray-600 hover:text-indigo-300 hover:bg-blue-200 p-3 rounded-lg">Kontak</a>
      </nav>
      <div class="flex items-center p-3 rounded-lg">
        <div class="flex-shrink-0">
          <a href="/profile"><img src="/assets/images/logo3.png" alt="logo " class="w-10 h-10 rounded-full">
          </a>
        </div>

      </div>
    </div>
  </header>
  <?php $navbar = ob_get_clean(); ?>
  <?php require __DIR__ . '/../../../main.php'; ?>
