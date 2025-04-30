<?php ob_start(); ?>

<div class="px-6 py-10 md:px-12 lg:px-16 bg-gray-50">
  <!-- LogOut Button -->
  <div class="container flex justify-end my-5">
    <a href="/logout" class="bg-red-500 text-white p-3 rounded-xl font-semibold hover:bg-red-600 transition duration-300">LogOut</a>
  </div>

  <!-- Profile Form Section -->
  <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
    <div class="lg:col-span-2 bg-white rounded-lg shadow-lg p-8">
      <h2 class="text-2xl font-semibold text-gray-800 mb-6">Create Your Profile</h2>
      <?php if (isset($_SESSION['error2']) && !empty($_SESSION['error2'])): ?>
        <div class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
          <?= $_SESSION['error2'];
          unset($_SESSION['error2']); ?>
        </div>
      <?php endif; ?>

      <form action="/profile" method="POST" enctype="multipart/form-data">

        <!-- Profile Picture -->
        <div class="mb-6">
          <label for="profile-picture" class="block text-lg font-medium text-gray-700 mb-2">Profile Picture</label>
          <input type="file" id="profile-picture" name="profile-picture" class="file:border-2 file:border-gray-300 file:bg-white file:text-gray-800 file:py-2 file:px-4 file:rounded-md hover:file:bg-gray-100">
        </div>

        <!-- Name -->
        <div class="mb-4">
          <label for="name" class="block text-lg font-medium text-gray-700 mb-1">Name</label>
          <input type="text" id="name" name="name" required class="w-full p-3 bg-gray-100 text-gray-800 rounded-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-600" value="<?= $profileUser['nickname'] ?>">
        </div>

        <!-- Public Email -->
        <div class="mb-4">
          <label for="email" class="block text-lg font-medium text-gray-700 mb-1">Public Email</label>
          <input type="email" id="email" name="email" required class="w-full p-3 bg-gray-100 text-gray-800 rounded-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-600" value="<?= $profileUser['email'] ?>">
        </div>

        <!-- Bio -->
        <div class="mb-4">
          <label for="bio" class="block text-lg font-medium text-gray-700 mb-1">Bio</label>
          <textarea id="bio" name="bio" rows="4" required class="w-full p-3 bg-gray-100 text-gray-800 rounded-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-600"><?= $profileUser['bio'] ?></textarea>
        </div>

        <!-- Pronouns -->
        <div class="mb-4">
          <label for="pronouns" class="block text-lg font-medium text-gray-700 mb-1">Pronouns</label>
          <select id="pronouns" name="pronouns" class="w-full p-3 bg-gray-100 text-gray-800 rounded-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-600">
            <option value="">Don't specify</option>
            <option value="he/him" <?= $profileUser['pronouns'] == 'he/him' ? 'selected' : '' ?>>He/Him</option>
            <option value="she/her" <?= $profileUser['pronouns'] == 'she/her' ? 'selected' : '' ?>>She/Her</option>
            <option value="they/them" <?= $profileUser['pronouns'] == 'they/them' ? 'selected' : '' ?>>They/Them</option>
          </select>
        </div>

        <!-- URL -->
        <div class="mb-4">
          <label for="url" class="block text-lg font-medium text-gray-700 mb-1">URL</label>
          <input type="url" id="url" name="url" class="w-full p-3 bg-gray-100 text-gray-800 rounded-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-600" value="<?= $profileUser['url'] ?>">
        </div>

        <!-- Submit Button -->
        <div class="flex justify-end">
          <input type="submit" name="saveProfile" class="bg-indigo-600 hover:bg-indigo-700 text-white px-6 py-3 rounded-md transition" value="Save Profile">
        </div>
      </form>
    </div>

    <!-- Profile Picture Preview Section -->
    <div class="bg-white rounded-lg shadow-lg p-8">
      <h2 class="text-2xl font-semibold text-gray-800 mb-6">Profile Picture</h2>
      <div class="flex justify-center mb-6">
        <img src="/uploads/profile/<?= htmlspecialchars($profileUser['image']) ?>" class="object-cover rounded-full border-4 border-gray-300 w-32 h-32" alt="Profile Picture">
      </div>

      <!-- Password Change Form -->
      <div>
        <h3 class="text-xl font-semibold text-gray-800 mb-5">Change Your Password</h3>

        <!-- Error Message for Password -->
        <?php if (isset($_SESSION['error']) && !empty($_SESSION['error'])): ?>
          <div class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
            <?= $_SESSION['error'];
            unset($_SESSION['error']); ?>
          </div>
        <?php endif; ?>

        <!-- Password Form -->
        <form action="/profile" method="POST">
          <div class="mb-4">
            <label for="currentpass" class="block text-lg font-medium text-gray-700 mb-1">Current Password</label>
            <input type="password" id="currentpass" name="currentpass" class="w-full p-3 bg-gray-100 text-gray-800 rounded-md border-3 border-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-600">
          </div>

          <div class="mb-4">
            <label for="newpass" class="block text-lg font-medium text-gray-700 mb-1">New Password</label>
            <input type="password" id="newpass" name="newpass" class="w-full p-3 bg-gray-100 text-gray-800 rounded-md border-3 border-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-600">
          </div>

          <div class="mb-4">
            <label for="confirmpass" class="block text-lg font-medium text-gray-700 mb-1">Confirm New Password</label>
            <input type="password" id="confirmpass" name="confirmpass" class="w-full p-3 bg-gray-100 text-gray-800 rounded-md border-3 border-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-600">
          </div>

          <div class="flex justify-end">
            <input type="submit" name="savePass" class="bg-indigo-600 hover:bg-indigo-700 text-white px-6 py-3 rounded-md transition" value="Save Password">
          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- User Articles Section -->
  <div class="mt-20 mb-10">
    <div class="bg-white p-5 rounded-xl shadow-lg">
      <p class="text-lg text-gray-600 font-medium">Your Articles:</p>
    </div>

    <div class="mt-6 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
      <?php foreach ($profileArticle as $article) : ?>
        <div class="bg-white rounded-lg shadow-lg hover:shadow-xl transition-transform transform hover:scale-105 hover:shadow-2xl">
          <img src="/uploads/<?= htmlspecialchars($article['picture']) ?>" alt="article image" class="w-full h-48 object-cover rounded-t-lg">
          <div class="p-6">
            <h3 class="mt-4 text-xl font-semibold text-gray-800"><?= htmlspecialchars(substr(strip_tags($article['content']), 0, 100)) ?>...</h3>
            <div class="mt-4 text-sm text-gray-500 flex justify-between items-center">
              <span>1970 views</span>
              <span class="text-gray-400"><?= htmlspecialchars($article['date']) ?></span>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</div>

<?php $profile = ob_get_clean(); ?>
<?php require __DIR__ . '/../../../main.php'; ?>
