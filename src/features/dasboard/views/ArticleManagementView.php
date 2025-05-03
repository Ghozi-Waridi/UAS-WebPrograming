<?php
// ArticleManagementView.php
namespace Uas_ProgWeb\features\Dasboard\views;
?>

<div class="bg-white rounded-lg shadow overflow-hidden">
  <div class="px-6 py-4 border-b border-gray-200 flex justify-between items-center">
    <h3 class="text-lg font-semibold text-gray-700">Article Management</h3>
    <button class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg flex items-center">
      <i class="fas fa-plus mr-2"></i> New Article
    </button>
  </div>
  
  <!-- Filter and Search -->
  <div class="p-4 bg-gray-50 border-b border-gray-200">
    <div class="flex flex-col md:flex-row gap-4">
      <div class="relative flex-grow">
        <span class="absolute inset-y-0 left-0 pl-3 flex items-center">
          <i class="fas fa-search text-gray-500"></i>
        </span>
        <input class="form-input w-full rounded-md pl-10 pr-4 focus:border-blue-600"
          type="text" placeholder="Search articles...">
      </div>
      <div class="flex gap-2">
        <select class="form-select rounded-md focus:border-blue-600">
          <option>All Categories</option>
          <option>Technology</option>
          <option>Literature</option>
          <option>Arts & Culture</option>
          <option>Science</option>
          <option>Environment</option>
          <option>Politics</option>
        </select>
        <select class="form-select rounded-md focus:border-blue-600">
          <option>All Status</option>
          <option>Published</option>
          <option>Draft</option>
          <option>Archived</option>
        </select>
      </div>
    </div>
  </div>
  
  <!-- Articles Table -->
  <div class="overflow-x-auto">
    <table class="min-w-full divide-y divide-gray-200">
      <thead class="bg-gray-50">
        <tr>
          <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Article</th>
          <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Author</th>
          <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Category</th>
          <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Published</th>
          <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
          <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Views</th>
          <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
        </tr>
      </thead>
      <tbody class="bg-white divide-y divide-gray-200">
        <!-- Article 1 -->
        <tr>
          <td class="px-6 py-4">
            <div class="text-sm font-medium text-gray-900">Keanekaragaman Makanan Tradisional</div>
            <div class="text-xs text-gray-500">ID: ART-2023-0445</div>
          </td>
          <td class="px-6 py-4 whitespace-nowrap">
            <div class="flex items-center">
              <div class="flex-shrink-0 h-8 w-8 bg-red-500 rounded-full flex items-center justify-center text-white text-xs">
                DS
              </div>
              <div class="ml-3">
                <div class="text-sm text-gray-900">Dewi Sartika</div>
              </div>
            </div>
          </td>
          <td class="px-6 py-4 whitespace-nowrap">
            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-orange-100 text-orange-800">
              Arts & Culture
            </span>
          </td>
          <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
            Mar 25, 2023
          </td>
          <td class="px-6 py-4 whitespace-nowrap">
            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
              Published
            </span>
          </td>
          <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
            1,245
          </td>
          <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
            <div class="flex space-x-2">
              <button class="text-blue-600 hover:text-blue-900">
                <i class="fas fa-eye"></i>
              </button>
              <button class="text-yellow-600 hover:text-yellow-900">
                <i class="fas fa-edit"></i>
              </button>
              <button class="text-red-600 hover:text-red-900">
                <i class="fas fa-trash"></i>
              </button>
            </div>
          </td>
        </tr>
        
        <!-- Article 2 -->
        <tr>
          <td class="px-6 py-4">
            <div class="text-sm font-medium text-gray-900">Perkembangan Startup di Indonesia</div>
            <div class="text-xs text-gray-500">ID: ART-2023-0444</div>
          </td>
          <td class="px-6 py-4 whitespace-nowrap">
            <div class="flex items-center">
              <div class="flex-shrink-0 h-8 w-8 bg-green-500 rounded-full flex items-center justify-center text-white text-xs">
                BP
              </div>
              <div class="ml-3">
                <div class="text-sm text-gray-900">Budi Pratama</div>
              </div>
            </div>
          </td>
          <td class="px-6 py-4 whitespace-nowrap">
            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">
              Technology
            </span>
          </td>
          <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
            Mar 20, 2023
          </td>
          <td class="px-6 py-4 whitespace-nowrap">
            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
              Published
            </span>
          </td>
          <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
            2,378
          </td>
          <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
            <div class="flex space-x-2">
              <button class="text-blue-600 hover:text-blue-900">
                <i class="fas fa-eye"></i>
              </button>
              <button class="text-yellow-600 hover:text-yellow-900">
                <i class="fas fa-edit"></i>
              </button>
              <button class="text-red-600 hover:text-red-900">
                <i class="fas fa-trash"></i>
              </button>
            </div>
          </td>
        </tr>
        
        <!-- Article 3 -->
        <tr>
          <td class="px-6 py-4">
            <div class="text-sm font-medium text-gray-900">Puisi-Puisi Kontemporer</div>
            <div class="text-xs text-gray-500">ID: ART-2023-0443</div>
          </td>
          <td class="px-6 py-4 whitespace-nowrap">
            <div class="flex items-center">
              <div class="flex-shrink-0 h-8 w-8 bg-blue-500 rounded-full flex items-center justify-center text-white text-xs">
                RA
              </div>
              <div class="ml-3">
                <div class="text-sm text-gray-900">Raisa Andriana</div>
              </div>
            </div>
          </td>
          <td class="px-6 py-4 whitespace-nowrap">
            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-purple-100 text-purple-800">
              Literature
            </span>
          </td>
          <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
            Mar 18, 2023
          </td>
          <td class="px-6 py-4 whitespace-nowrap">
            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-100 text-gray-800">
              Draft
            </span>
          </td>
          <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
            0
          </td>
          <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
            <div class="flex space-x-2">
              <button class="text-blue-600 hover:text-blue-900">
                <i class="fas fa-eye"></i>
              </button>
              <button class="text-yellow-600 hover:text-yellow-900">
                <i class="fas fa-edit"></i>
              </button>
              <button class="text-red-600 hover:text-red-900">
                <i class="fas fa-trash"></i>
              </button>
            </div>
          </td>
        </tr>
        
        <!-- Article 4 -->
        <tr>
          <td class="px-6 py-4">
            <div class="text-sm font-medium text-gray-900">Sejarah Alat Musik Tradisional</div>
            <div class="text-xs text-gray-500">ID: ART-2023-0442</div>
          </td>
          <td class="px-6 py-4 whitespace-nowrap">
            <div class="flex items-center">
              <div class="flex-shrink-0 h-8 w-8 bg-yellow-500 rounded-full flex items-center justify-center text-white text-xs">
                AW
              </div>
              <div class="ml-3">
                <div class="text-sm text-gray-900">Andi Wijaya</div>
              </div>
            </div>
          </td>
          <td class="px-6 py-4 whitespace-nowrap">
            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-orange-100 text-orange-800">
              Arts & Culture
            </span>
          </td>
          <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
            Mar 15, 2023
          </td>
          <td class="px-6 py-4 whitespace-nowrap">
            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
              Archived
            </span>
          </td>
          <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
            568
          </td>
          <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
            <div class="flex space-x-2">
              <button class="text-blue-600 hover:text-blue-900">
                <i class="fas fa-eye"></i>
              </button>
              <button class="text-yellow-600 hover:text-yellow-900">
                <i class="fas fa-edit"></i>
              </button>
              <button class="text-red-600 hover:text-red-900">
                <i class="fas fa-trash"></i>
              </button>
            </div>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
  
  <!-- Pagination -->
  <div class="px-6 py-4 border-t border-gray-200 flex items-center justify-between">
    <div class="text-sm text-gray-500">
      Showing <span class="font-medium">1</span> to <span class="font-medium">4</span> of <span class="font-medium">35</span> results
    </div>
    <div class="flex space-x-2">
      <button class="px-3 py-1 rounded-md bg-gray-100 text-gray-700 hover:bg-gray-200 disabled:opacity-50">
        Previous
      </button>
      <button class="px-3 py-1 rounded-md bg-blue-500 text-white">
        1
      </button>
      <button class="px-3 py-1 rounded-md bg-gray-100 text-gray-700 hover:bg-gray-200">
        2
      </button>
      <button class="px-3 py-1 rounded-md bg-gray-100 text-gray-700 hover:bg-gray-200">
        3
      </button>
      <button class="px-3 py-1 rounded-md bg-gray-100 text-gray-700 hover:bg-gray-200">
        Next
      </button>
    </div>
  </div>
</div>
