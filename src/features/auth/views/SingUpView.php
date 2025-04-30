<?php
// Menghindari cache pada halaman registrasi
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Pragma: no-cache");
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
?>

<script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

<div class="relative p-6 z-1 sm:p-0">
  <div class="relative flex flex-col justify-center w-full h-screen sm:p-0 lg:flex-row">
    <!-- Form -->
    <div class="flex flex-col flex-1 w-full lg:w-1/2">
      <div class="w-full max-w-md pt-10 mx-auto">
        <a
          href="/"
          class="inline-flex items-center text-sm text-gray-500 transition-colors hover:text-gray-700">
          <svg
            class="stroke-current"
            xmlns="http://www.w3.org/2000/svg"
            width="20"
            height="20"
            viewBox="0 0 20 20"
            fill="none">
            <path
              d="M12.7083 5L7.5 10.2083L12.7083 15.4167"
              stroke=""
              stroke-width="1.5"
              stroke-linecap="round"
              stroke-linejoin="round" />
          </svg>
          Back to dashboard
        </a>
      </div>

      <div class="flex flex-col justify-center flex-1 w-full max-w-md mx-auto">
        <div>
          <div class="mb-5 sm:mb-8">
            <h1 class="mb-2 font-semibold text-gray-800 text-title-sm sm:text-title-md">
              Sign Up
            </h1>
            <p class="text-sm text-gray-500">
              Create an account by filling in your details!
            </p>
          </div>
          <div>
            <!-- Display error message if registration fails -->
            <?php if (isset($_SESSION['error'])): ?>
              <div class="bg-red-500 text-white p-2 rounded-xl mb-4">
                <?php
                echo $_SESSION['error'];
                unset($_SESSION['error']);
                ?>
              </div>
            <?php endif; ?>

            <!-- Display success message if registration is successful -->
            <?php if (isset($_SESSION['success'])): ?>
              <div class="bg-green-500 text-white p-2 rounded-xl mb-4">
                <?php
                echo $_SESSION['success'];
                unset($_SESSION['success']);
                ?>
              </div>
            <?php endif; ?>

            <form action="/signup" method="POST">
              <div class="space-y-5">
                <!-- Username -->
                <div>
                  <label class="mb-1.5 block text-sm font-medium text-gray-700">
                    Username<span class="text-error-500">*</span>
                  </label>
                  <input
                    type="text"
                    name="username"
                    placeholder="Enter your username"
                    class="h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 shadow-theme-xs placeholder:text-gray-400 focus:border-indigo-300 focus:outline-hidden focus:ring-3 focus:ring-indigo-500/10"
                    required />
                </div>

                <!-- Email -->
                <div>
                  <label class="mb-1.5 block text-sm font-medium text-gray-700">
                    Email<span class="text-error-500">*</span>
                  </label>
                  <input
                    type="email"
                    name="email"
                    placeholder="info@gmail.com"
                    class="h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 shadow-theme-xs placeholder:text-gray-400 focus:border-indigo-300 focus:outline-hidden focus:ring-3 focus:ring-indigo-500/10"
                    required />
                </div>

                <!-- Password -->
                <div>
                  <label class="mb-1.5 block text-sm font-medium text-gray-700">
                    Password<span class="text-error-500">*</span>
                  </label>
                  <div class="relative">
                    <input
                      type="password"
                      name="password"
                      placeholder="Enter your password"
                      class="h-11 w-full rounded-lg border border-gray-300 bg-transparent py-2.5 pl-4 pr-11 text-sm text-gray-800 shadow-theme-xs placeholder:text-gray-400 focus:border-indigo-300 focus:outline-hidden focus:ring-3 focus:ring-indigo-500/10"
                      required />
                  </div>
                </div>

                <!-- Confirm Password -->
                <div>
                  <label class="mb-1.5 block text-sm font-medium text-gray-700">
                    Confirm Password<span class="text-error-500">*</span>
                  </label>
                  <div class="relative">
                    <input
                      type="password"
                      name="confirm_password"
                      placeholder="Confirm your password"
                      class="h-11 w-full rounded-lg border border-gray-300 bg-transparent py-2.5 pl-4 pr-11 text-sm text-gray-800 shadow-theme-xs placeholder:text-gray-400 focus:border-indigo-300 focus:outline-hidden focus:ring-3 focus:ring-indigo-500/10"
                      required />
                  </div>
                </div>

                <!-- Button -->
                <div>
                  <input type="submit" value="Sign Up" name="signup"
                    class="flex items-center justify-center w-full px-4 py-3 text-sm font-medium text-white transition rounded-lg bg-indigo-500 shadow-theme-xs hover:bg-indigo-600">
                </div>
              </div>
            </form>

            <div class="mt-5">
              <p class="text-sm font-normal text-center text-gray-700 sm:text-start">
                Already have an account?
                <a href="/login" class="text-indigo-500 hover:text-indigo-600">Login</a>
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Right Side Image or Logo -->
    <div class="relative items-center hidden w-full h-full bg-indigo-950 lg:grid lg:w-1/2">
      <div class="flex items-center justify-center z-1">
        <div class="flex flex-col items-center max-w-xs">
          <a href="index.html" class="block mb-4">
            <img src="/assets/images/logo.png" alt="Logo" />
          </a>
          <p class="text-center text-gray-400">
            NusantaraIn is a platform for sharing articles and stories. Join us to explore the world of writing and creativity.
          </p>
        </div>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
  if (window.history && window.history.pushState) {
    window.history.pushState(null, null, window.location.href);
    window.onpopstate = function() {
      window.history.pushState(null, null, window.location.href);
    };
  }
</script>
