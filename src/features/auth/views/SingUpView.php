<script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

<div class="bg-gray-200 flex items-center justify-center min-h-screen">
  <div class="bg-white p-8 rounded-lg shadow-lg max-w-sm w-full">
    <h2 class="text-2xl font-semibold mb-4 text-center">Registrasi</h2>

    <!-- Tampilkan pesan error jika ada -->
    <?php if (isset($_SESSION['error'])): ?>
      <div class="bg-red-500 text-white p-2 rounded-xl mb-4">
        <?php
        echo $_SESSION['error'];
        unset($_SESSION['error']); // Menghapus session error setelah ditampilkan
        ?>
      </div>
    <?php endif; ?>

    <!-- Tampilkan pesan sukses jika ada -->
    <?php if (isset($_SESSION['success'])): ?>
      <div class="bg-green-500 text-white p-2 rounded-xl mb-4">
        <?php
        echo $_SESSION['success'];
        unset($_SESSION['success']); // Menghapus session success setelah ditampilkan
        ?>
      </div>
    <?php endif; ?>

    <form action="/singup" method="POST">
      <input type="text" name="username" class="w-full p-2 mb-4 border rounded" placeholder="Username" required>
      <input type="email" name="email" class="w-full p-2 mb-4 border rounded" placeholder="Email" required>
      <input type="password" name="password" class="w-fullj p-2 mb-4 border rounded" placeholder="Password" required>
      <input type="password" name="confirm_password" class="w-full p-2 mb-4 border rounded" placeholder="Confirm Password" required>
      <input type="submit" value="singup" name="singup" class="w-full p-2 bg-blue-500 text-white rounded-xl">
    </form>
    <p class="mt-4 text-center">Sudah punya akun? <a href="/login" class="text-blue-500">Login</a></p>
  </div>
</div>
