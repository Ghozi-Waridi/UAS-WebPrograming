<?php
    if (!isset($_SESSION)) {
      session_start();
    }$home = isset($home) ? $home : '';
$content = isset($content) ? $content : '';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Portal Berita</title>
  <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link href="/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
  <script src="https://cdn.ckeditor.com/ckeditor5/34.0.0/classic/ckeditor.js"></script>
  <!-- Font Awesome untuk ikon -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>

<body class="bg-gray-100">

  <!-- Header Section -->
<header class="bg-white shadow-md py-4">
  <div class="container mx-auto flex justify-between items-center px-6">
        <div class="text-2xl font-bold text-gray-800">
    <a href="/" class="flex items-center text-gray-900 hover:text-indigo-600">
  <span class="bg-blue-900 p-1 rounded-full mr-2">
    <img src="/assets/images/logo.png" alt="Logo" class="w-10 h-10 inline-block">
  </span>
  <span class="text-blue-600">Nusantara</span><span class="text-gray-800">IN</span>
</a>    </div>
    <nav class="space-x-6">
      <a href="/" class="text-gray-600 hover:text-indigo-300 hover:bg-blue-200 p-3 rounded-lg">Beranda</a>
      <a href="#" class="text-gray-600 hover:text-indigo-300 hover:bg-blue-200 p-3 rounded-lg">Kategori</a>
      <a href="#" class="text-gray-600 hover:text-indigo-300 hover:bg-blue-200 p-3 rounded-lg">Tentang</a>
      <a href="#" class="text-gray-600 hover:text-indigo-300 hover:bg-blue-200 p-3 rounded-lg">Kontak</a>
    </nav>
    <div class="flex items-center p-3 rounded-lg">
      <div class="flex-shrink-0">
        <a href="/profile">
          <?php 
          // Check if the session variable exists and is not empty
          if(isset($_SESSION['imageProfile']) && !empty($_SESSION['imageProfile'])):
          ?>
            <img src="/uploads/profile/<?php echo $_SESSION['imageProfile']; ?>" alt="profile" class="w-10 h-10 rounded-full">
          <?php else: ?>
            <!-- Fallback image if session imageProfile is not set -->
            <img src="/uploads/profile/profile.png" alt="profile" class="w-10 h-10 rounded-full">
          <?php endif; ?>
        </a>
      </div>
    </div>
  </div>
</header>
  <?= isset($home) ? $home : ''; ?>

  <?= isset($detail) ? $detail : ''; ?>
  <?= isset($profile) ? $profile : ''; ?>




  <!-- <div class="container mx-auto max-w-4xl px-4 py-8 "> -->
  <!--   <?= isset($content) ? $content : ''; ?> -->
  <!-- </div> -->
    <!-- <script src="/js/app.js"></script> -->
<footer class="bg-white shadow-md py-4 mt-10">
  <div class="container mx-auto text-center">
    <div class="mb-4">
      <h3 class="text-lg font-semibold text-gray-800 mb-2">Follow Us</h3>
      <div class="flex justify-center space-x-4">
        <a href="https://twitter.com/" class="text-gray-600 hover:text-blue-500 transition-colors" target="_blank" rel="noopener noreferrer">
          <i class="fab fa-twitter text-2xl"></i>
        </a>
        <a href="https://facebook.com/" class="text-gray-600 hover:text-blue-700 transition-colors" target="_blank" rel="noopener noreferrer">
          <i class="fab fa-facebook text-2xl"></i>
        </a>
        <a href="https://instagram.com/" class="text-gray-600 hover:text-pink-500 transition-colors" target="_blank" rel="noopener noreferrer">
          <i class="fab fa-instagram text-2xl"></i>
        </a>
 
      </div>
    </div>
    <p class="text-gray-600">© 2025 NusantaraIN. All rights reserved.</p>
  </div>
</footer>
</body>

</html>
