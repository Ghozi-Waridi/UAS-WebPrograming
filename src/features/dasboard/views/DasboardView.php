<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="NusantaraIN Admin Dashboard">
  <title>NusantaraIN Dashboard</title>

  <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js" defer></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>

<body class="bg-gray-100">
  <div class="min-h-screen flex">
    <!-- Sidebar -->
    <aside id="sidebar" class="bg-blue-800 text-white w-64 py-4 flex flex-col transition-all duration-300 fixed md:relative z-40 transform -translate-x-full md:translate-x-0">
      <div class="px-6 py-4 flex justify-between items-center">
        <h1 class="text-2xl font-bold">NusantaraIN</h1>
        <button id="closeSidebar" class="text-white focus:outline-none md:hidden" aria-label="Close sidebar">
          <i class="fas fa-times"></i>
        </button>
      </div>
      <nav class="mt-8 flex-1">
        <div class="px-4">
          <a href="#" class="sidebar-link block px-4 py-3 rounded-lg hover:bg-blue-700 mb-2 flex items-center" data-page="dashboard" aria-current="page">
            <i class="fas fa-home mr-3" aria-hidden="true"></i> Dashboard
          </a>

          <a href="#" class="sidebar-link block px-4 py-3 rounded-lg hover:bg-blue-700 mb-2 flex items-center" data-page="userManagement">
            <i class="fas fa-users mr-3" aria-hidden="true"></i> User Management
          </a>

          <a href="#" class="sidebar-link block px-4 py-3 rounded-lg hover:bg-blue-700 mb-2 flex items-center" data-page="articleApproval">
            <i class="fas fa-newspaper mr-3" aria-hidden="true"></i> Article Management
          </a>


        </div>
      </nav>
      <div class="px-6 py-4 border-t border-blue-700">
        <a href="/logout" class="block px-4 py-3 rounded-lg hover:bg-red-700 mb-2 flex items-center text-white">
          <i class="fas fa-sign-out-alt mr-3" aria-hidden="true"></i> Logout
        </a>
      </div>
    </aside>

    <!-- Overlay for mobile -->
    <div id="overlay" class="fixed inset-0 bg-black bg-opacity-50 z-30 hidden md:hidden"></div>

    <!-- Main Content -->
    <div class="flex-1 flex flex-col overflow-hidden transition-all duration-300" id="mainWrapper">
      <!-- Top Navigation -->
      <header class="bg-white shadow-sm">
        <div class="flex items-center justify-between px-6 py-4">
          <div class="flex items-center">
            <button id="openSidebar" class="text-gray-500 focus:outline-none md:hidden" aria-label="Open sidebar">
              <i class="fas fa-bars"></i>
            </button>

          </div>
          <div class="flex items-center">


            <div class="relative">
              <button id="userMenuButton" class="flex items-center focus:outline-none" aria-expanded="false" aria-haspopup="true">
                <div class="w-8 h-8 bg-blue-600 rounded-full flex items-center justify-center text-white">
                  <span>A</span>
                </div>
                <span class="ml-2 hidden md:block">Admin</span>
              </button>
              <div id="userMenu" class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 hidden z-50">

                <a href="/logout" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Logout</a>
              </div>
            </div>
          </div>
        </div>
      </header>

      <!-- Main Content Area -->
      <main id="mainContent" class="flex-1 overflow-y-auto p-6 bg-gray-100">
<!-- Dashboard Charts Section -->
          <div class="flex flex-col md:flex-row justify-between items-center mb-6">
            <h2 class="text-2xl font-semibold text-gray-800">Dashboard Overview</h2>

          </div>

          <!-- Dashboard Cards -->
          <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
            <div class="bg-white rounded-lg shadow-sm p-6">
              <div class="flex items-center justify-between">
                <div>
                  <h3 class="text-gray-500 text-sm font-medium">Total Users</h3>
                  <div class="mt-2 flex items-baseline">
<span class="text-3xl font-semibold text-gray-900"><?= $totalUsers ?></span>
                                   </div>
                </div>
                <div class="rounded-full bg-blue-100 p-3">
                  <i class="fas fa-users text-blue-600 text-xl"></i>
                </div>
              </div>
            </div>

            <div class="bg-white rounded-lg shadow-sm p-6">
              <div class="flex items-center justify-between">
                <div>
                  <h3 class="text-gray-500 text-sm font-medium">Total Articles</h3>
                  <div class="mt-2 flex items-baseline">
<span class="text-3xl font-semibold text-gray-900"><?= $totalArticles ?></span>
                  </div>
                </div>
                <div class="rounded-full bg-green-100 p-3">
                  <i class="fas fa-newspaper text-green-600 text-xl"></i>
                </div>
              </div>
            </div>

            <div class="bg-white rounded-lg shadow-sm p-6">
              <div class="flex items-center justify-between">
                <div>
                  <h3 class="text-gray-500 text-sm font-medium">Pending Approval</h3>
                  <div class="mt-2 flex items-baseline">
                    <span class="text-3xl font-semibold text-gray-900"><?= $pendingApproval ?></span>
  
                  </div>
                </div>
                <div class="rounded-full bg-yellow-100 p-3">
                  <i class="fas fa-clock text-yellow-600 text-xl"></i>
                </div>
              </div>
            </div>


          </div>

      </main>
    </div>
  </div>

  <script>
    // Sidebar Toggle Functionality
    const sidebar = document.getElementById('sidebar');
    const openSidebarBtn = document.getElementById('openSidebar');
    const closeSidebarBtn = document.getElementById('closeSidebar');
    const overlay = document.getElementById('overlay');
    const mainWrapper = document.getElementById('mainWrapper');
    const userMenuButton = document.getElementById('userMenuButton');
    const userMenu = document.getElementById('userMenu');
    let isSidebarOpen = false;

    // Function to close sidebar
    function closeSidebar() {
      isSidebarOpen = false;
      sidebar.classList.add('-translate-x-full');
      overlay.classList.add('hidden');
      document.body.classList.remove('overflow-hidden', 'md:overflow-auto');
    }

    // Function to open sidebar
    function openSidebar() {
      isSidebarOpen = true;
      sidebar.classList.remove('-translate-x-full');
      overlay.classList.remove('hidden');
      document.body.classList.add('overflow-hidden', 'md:overflow-auto');
    }

    // Event listeners for sidebar buttons
    openSidebarBtn.addEventListener('click', openSidebar);
    closeSidebarBtn.addEventListener('click', closeSidebar);
    overlay.addEventListener('click', closeSidebar);

    // User menu toggle
    userMenuButton.addEventListener('click', () => {
      userMenu.classList.toggle('hidden');
      userMenuButton.setAttribute('aria-expanded', userMenu.classList.contains('hidden') ? 'false' : 'true');
      
      // Close menu when clicking outside
      document.addEventListener('click', function closeMenu(e) {
        if (!userMenuButton.contains(e.target) && !userMenu.contains(e.target)) {
          userMenu.classList.add('hidden');
          userMenuButton.setAttribute('aria-expanded', 'false');
          document.removeEventListener('click', closeMenu);
        }
      });
    });

    // Handle window resize
    function handleResize() {
      if (window.innerWidth >= 768) { // md breakpoint
        sidebar.classList.remove('-translate-x-full');
        overlay.classList.add('hidden');
        document.body.classList.remove('overflow-hidden');
      } else {
        if (!isSidebarOpen) {
          sidebar.classList.add('-translate-x-full');
        }
      }
    }

    // Check on page load and window resize
    window.addEventListener('resize', handleResize);
    handleResize();

    // AJAX content loader with cache
    const sidebarLinks = document.querySelectorAll('.sidebar-link');
    const mainContent = document.getElementById('mainContent');
    const contentCache = {};
    let currentPage = 'dashboard';

    sidebarLinks.forEach(link => {
      link.addEventListener('click', function(e) {
        e.preventDefault();
        const page = this.getAttribute('data-page');
        
        // Skip if already on this page
        if (page === currentPage) return;
        
        // Update active link styling
        sidebarLinks.forEach(l => {
          l.classList.remove('bg-blue-900');
          l.removeAttribute('aria-current');
        });
        this.classList.add('bg-blue-900');
        this.setAttribute('aria-current', 'page');
        
        // Close sidebar on mobile after clicking a link
        if (window.innerWidth < 768) {
          closeSidebar();
        }
        
        loadContent(page);
        currentPage = page;
      });
    });

    function loadContent(page) {
      // Show loading state
      mainContent.innerHTML = '<div class="flex justify-center items-center h-64"><div class="animate-spin rounded-full h-16 w-16 border-t-2 border-b-2 border-blue-600"></div></div>';
      
      // Check if content is already cached
      if (contentCache[page]) {
        mainContent.innerHTML = contentCache[page];
        initializeCharts();
        return;
      }
      
      // Fetch content with timeout for reliability
      const controller = new AbortController();
      const timeoutId = setTimeout(() => controller.abort(), 10000);
      
      fetch(`/dashboard/${page}`, { signal: controller.signal })
        .then(response => {
          clearTimeout(timeoutId);
          if (!response.ok) throw new Error('Network response was not ok');
          return response.text();
        })
        .then(html => {
          contentCache[page] = html; // Cache the content
          mainContent.innerHTML = html;
          initializeCharts();
        })
        .catch(error => {
          clearTimeout(timeoutId);
          console.error('Error loading content:', error);
          mainContent.innerHTML = `
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
              <strong class="font-bold">Error!</strong>
              <span class="block sm:inline"> Failed to load content. Please try again later.</span>
              <button class="retry-btn px-4 py-2 bg-red-500 text-white rounded mt-2" onclick="loadContent('${page}')">Retry</button>
            </div>
          `;
        });
    }

    // Initialize charts if they exist
    function initializeCharts() {
      // For demo purposes, we're adding charts to the dashboard page only
      if (currentPage === 'dashboard') {
 

        // Categories Chart
        const categoriesCtx = document.getElementById('categoriesChart');
        if (categoriesCtx) {
          new Chart(categoriesCtx, {
            type: 'doughnut',
            data: {
              labels: ['Travel', 'Food', 'Culture', 'History', 'Nature'],
              datasets: [{
                data: [35, 25, 20, 15, 5],
                backgroundColor: [
                  'rgba(59, 130, 246, 0.8)',
                  'rgba(16, 185, 129, 0.8)',
                  'rgba(139, 92, 246, 0.8)',
                  'rgba(249, 115, 22, 0.8)',
                  'rgba(236, 72, 153, 0.8)'
                ]
              }]
            },
            options: {
              responsive: true,
              maintainAspectRatio: false,
              plugins: {
                legend: {
                  position: 'right'
                }
              }
            }
          });
        }
      }
    }

    // Set initial active link
    document.querySelector('[data-page="dashboard"]').classList.add('bg-blue-900');
    document.querySelector('[data-page="dashboard"]').setAttribute('aria-current', 'page');
    
    // Initialize charts on page load
    setTimeout(initializeCharts, 100);
  </script>
</body>

</html>
