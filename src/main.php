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
  <!-- <link href="/css/style.css" rel="stylesheet"> -->
</head>

<body class="bg-gray-100">

  <!-- Header Section -->
<header class="bg-white shadow-md py-4">
  <div class="container mx-auto flex justify-between items-center px-6">
    <div class="text-2xl font-bold text-gray-800">
      <a href="/" class="text-gray-900 hover:text-indigo-600">NusantaraIN</a>
    </div>
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
</body>

</html>
