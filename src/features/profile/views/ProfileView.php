<?php ob_start(); ?>


<div class="px-10 py-5 md:px-10 md:py-5 lg:px-30 lg:py-15">
  <div class="container flex items-end my-3">
    <a href="/logout" class="bg-red-500 text-white p-3 rounded-xl margin-5 font-bold">LogOut</a>

  </div>


  <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5 ">
    <div class=" lg:col-span-2  rounded-lg shadow-lg">

      <div class="w-full mx-auto bg-white p-8 rounded-lg text-gray-800">
        <h2 class="text-2xl font-semibold mb-6">Create Your Profile</h2>

        <!-- Profile Picture -->
        <div class="mb-6">
          <label for="profile-picture" class="block text-lg font-medium mb-2">Profile Picture</label>
          <input type="file" id="profile-picture" name="profile-picture" class="file:border-2 file:border-gray-300 file:bg-white file:text-gray-800 file:py-2 file:px-4 file:rounded-md hover:file:bg-gray-100">
        </div>

        <!-- Name -->
        <div class="mb-6">
          <label for="name" class="block text-lg font-medium mb-2">Name</label>
          <input type="text" id="name" name="name" required class="w-full p-3 bg-gray-100 text-gray-800 rounded-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-600">
        </div>

        <!-- Public Email -->
        <div class="mb-6">
          <label for="email" class="block text-lg font-medium mb-2">Public Email</label>
          <input type="email" id="email" name="email" required class="w-full p-3 bg-gray-100 text-gray-800 rounded-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-600">
        </div>

        <!-- Bio -->
        <div class="mb-6">
          <label for="bio" class="block text-lg font-medium mb-2">Bio</label>
          <textarea id="bio" name="bio" rows="4" required class="w-full p-3 bg-gray-100 text-gray-800 rounded-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-600"></textarea>
        </div>

        <!-- Pronouns -->
        <div class="mb-6">
          <label for="pronouns" class="block text-lg font-medium mb-2">Pronouns</label>
          <select id="pronouns" name="pronouns" class="w-full p-3 bg-gray-100 text-gray-800 rounded-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-600">
            <option value="">Don't specify</option>
            <option value="he/him">He/Him</option>
            <option value="she/her">She/Her</option>
            <option value="they/them">They/Them</option>
          </select>
        </div>

        <!-- URL -->
        <div class="mb-6">
          <label for="url" class="block text-lg font-medium mb-2">URL</label>
          <input type="url" id="url" name="url" class="w-full p-3 bg-gray-100 text-gray-800 rounded-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-600">
        </div>

        <!-- Submit Button -->
        <div class="flex justify-end">
          <button type="submit" class="bg-indigo-600 hover:bg-indigo-300 text-white px-6 py-2 rounded-md transition">Save Profile</button>
        </div>
      </div>
    </div>
    <div class="rounded-lg p-10">
      <div class="flex items-center w-1/2 md:w-1/2  lg:w-full">
        <img src="/assets/icons/profile.png" class="object-cover rounded-full border-5 border-black-900">
      </div>
      <div class="rounded-lg  mt-10">
        <div class="mb-6">
          <label for="password1" class="block text-lg font-medium mb-2">Current Password</label>
          <input type="text" id="name" name="name" required class="w-full p-3 bg-gray-100 text-gray-800 rounded-md border-3 border-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-600">
        </div>
        <div class="mb-6">
          <label for="password1" class="block text-lg font-medium mb-2">New Password</label>
          <input type="text" id="name" name="name" required class="w-full p-3 bg-gray-100 text-gray-800 rounded-md border-3 border-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-600">
        </div>
        <div class="mb-6">
          <label for="password1" class="block text-lg font-medium mb-2">Confirm Password</label>
          <input type="text" id="name" name="name" required class="w-full p-3 bg-gray-100 text-gray-800 rounded-md border-3 border-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-600">

        </div>

        <div class="flex justify-start">
          <button type="submit" class="bg-indigo-600 hover:bg-indigo-300 text-white px-6 py-2 rounded-md transition">Save Password</button>
        </div>


      </div>
    </div>
  </div>






  <div class="mt-20 mb-10 flex items-center justify-between bg-white p-3 pl-5 rounded-xl shadow-lg">
    <p class="text-gray-600">Here are some of your recent activities:</p>
  </div>




  <div class="max-w-7xl mx-auto p-6 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
    <!-- Card 1 -->
    <div class="bg-white rounded-lg shadow-lg hover:shadow-xl transition-transform transform hover:scale-105 hover:shadow-2xl">
      <div class="space-x-3">
        <div class="bg-gray-200 rounded-lg flex items-center justify-center">
          <img src="/assets/images/berita1.jpg" alt="avatar" class="w-full h-fl object-cover rounded-t-lg">
        </div>
      </div>
      <div class="p-6">
        <h3 class="mt-4 text-xl font-semibold text-gray-800">As yen tumbles, gadget-loving Japan goes for secondhand...</h3>
        <div class="mt-4 text-sm text-gray-500 flex justify-between items-center">
          <span>1970 views</span>
          <span class="text-gray-400">Mon, Apr 21</span>
        </div>
      </div>
    </div>
    <div class="bg-white rounded-lg shadow-lg hover:shadow-xl transition-transform transform hover:scale-105 hover:shadow-2xl">
      <div class="space-x-3">
        <div class="bg-gray-200 rounded-lg flex items-center justify-center">
          <img src="/assets/images/berita1.jpg" alt="avatar" class="w-full h-fl object-cover ">
        </div>
      </div>
      <div class="p-6">
        <h3 class="mt-4 text-xl font-semibold text-gray-800">As yen tumbles, gadget-loving Japan goes for secondhand...</h3>
        <div class="mt-4 text-sm text-gray-500 flex justify-between items-center">
          <span>1970 views</span>
          <span class="text-gray-400">Mon, Apr 21</span>
        </div>
      </div>
    </div>

  </div>

  <?php $profile = ob_get_clean(); ?>
  <?php require __DIR__ . '/../../../main.php'; ?>
