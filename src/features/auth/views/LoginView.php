<?php
// Menghindari cache pada halaman login
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Pragma: no-cache");
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
?>

<script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

<div class="bg-gray-200 flex items-center justify-center min-h-screen">
  <div class="bg-white px-8 py-10 rounded-xl shadow-lg max-w-sm w-full">
    <h2 class="mb-10 text-2xl font-semibold text-center">Login</h2>

    <!-- Display error message if login fails -->
    <?php if (isset($_SESSION['error'])): ?>
      <div class="bg-red-500 text-white p-2 rounded-xl mb-4">
        <?php
        echo $_SESSION['error'];
        unset($_SESSION['error']); // Hapus error session setelah ditampilkan
        ?>
      </div>
    <?php endif; ?>

    <form action="/login" method="POST">
      <!-- Email Input -->
      <input type="email" name="email" class="w-full p-2 mb-4 border rounded-xl" placeholder="Email" required>

      <!-- Password Input -->
      <input type="password" name="password" class="w-full p-2 mb-4 border rounded-xl" placeholder="Password" required>

      <!-- Submit Button -->
      <input type="submit" value="Login" name="login" class="w-full p-2 bg-blue-500 text-white rounded-xl">
    </form>

    <!-- Link to Registration Page -->
    <p class="mt-4 text-center">Don't have an account? <a href="/singup" class="text-blue-500">Register</a></p>
  </div>
</div>

<!-- Tambahkan JavaScript di bawah ini -->
<script type="text/javascript">
  // Pastikan pengguna tidak bisa kembali ke halaman login setelah login
  if (window.history && window.history.pushState) {
    window.history.pushState('forward', null, window.location.href);
    window.history.forward();
  }
</script>
