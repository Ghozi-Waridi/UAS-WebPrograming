<?php
// DashboardContentView.php - Default dashboard content
namespace Uas_ProgWeb\features\Dasboard\views;
?>
  <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js" defer></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

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

          <!-- Charts -->
          <!-- <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-6"> -->
          <!---->
          <!---->
          <!--   <div class="bg-white rounded-lg shadow-sm p-6"> -->
          <!--     <h3 class="text-lg font-medium text-gray-900 mb-4">Content Categories</h3> -->
          <!--     <div class="h-64"> -->
          <!--       <canvas id="categoriesChart"></canvas> -->
          <!--     </div> -->
          <!--   </div> -->
          <!-- </div> -->
          <!---->
          <!-- Recent Activities -->
         
<script>
    
   
    // Initialize charts if they exist
    function initializeCharts() {
      // For demo purposes, we're adding charts to the dashboard page only
      if (currentPage === 'dashboard') {
        // User Growth Chart
        const userGrowthCtx = document.getElementById('userGrowthChart');
        if (userGrowthCtx) {
          new Chart(userGrowthCtx, {
            type: 'line',
            data: {
              labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
              datasets: [{
                label: 'Users',
                data: [1200, 1350, 1500, 1800, 2000, 2200, 2300, 2400, 2450, 2500, 2550, 2600],
                borderColor: 'rgb(59, 130, 246)',
                backgroundColor: 'rgba(59, 130, 246, 0.1)',
                tension: 0.4,
                fill: true
              }]
            },
            options: {
              responsive: true,
              maintainAspectRatio: false,
              plugins: {
                legend: {
                  display: false
                }
              },
              scales: {
                y: {
                  beginAtZero: true,
                  ticks: {
                    precision: 0
                  }
                }
              }
            }
          });
        }

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
    setTimeout(initializeCharts, 100);</script>
