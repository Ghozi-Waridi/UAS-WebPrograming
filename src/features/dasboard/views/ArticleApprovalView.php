<script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"></script>


<div class="bg-white rounded-lg shadow overflow-hidden">
  <div class="px-6 py-4 border-b border-gray-200">
    <h3 class="text-lg font-semibold text-gray-700">Article Approval Queue</h3>
  </div>

  <!-- Filter and Search -->
  <!-- (You can add your filter and search options here) -->

</div>

<!-- Articles Table -->
<div class="overflow-x-auto">
  <table class="min-w-full divide-y divide-gray-200">
    <thead class="bg-gray-50">
      <tr>
        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Article</th>
        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Author</th>
        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Category</th>
        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
      </tr>
    </thead>
    <tbody class="bg-white divide-y divide-gray-200">

      <?php foreach ($articleManagement as $article) : ?>
        <tr>
          <td class="px-6 py-4">
            <div class="text-sm font-medium text-gray-900"><?= htmlspecialchars($article['title']) ?></div>
            <div class="text-xs text-gray-500">ID: <?= htmlspecialchars($article['article_id']) ?></div>
          </td>
          <td class="px-6 py-4 whitespace-nowrap">
            <div class="flex items-center">
              <div class="flex-shrink-0 h-8 w-8 bg-blue-500 rounded-full flex items-center justify-center text-white text-xs">
                <?= strtoupper(substr($article['author_name'], 0, 2)) ?> <!-- Show first 2 initials of author's name -->
              </div>
              <div class="ml-3">
                <div class="text-sm text-gray-900"><?= htmlspecialchars($article['author_name']) ?></div>
              </div>
            </div>
          </td>
          <td class="px-6 py-4 whitespace-nowrap">
            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-orange-100 text-orange-800">
              <?= htmlspecialchars($article['category_name']) ?>
            </span>
          </td>

          <td class="px-6 py-4 whitespace-nowrap">
            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
            <?php echo $article['status'] == 'pending' ? 'bg-yellow-100 text-yellow-800' : 'bg-green-100 text-green-800'; ?>">
              <?= htmlspecialchars($article['status']) ?>
            </span>
          </td>
          <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
            <div class="flex space-x-2">

              <form method="POST" action="/approveArticle">
                <input type="hidden" name="article_id" value="<?= $article['article_id'] ?>" />
                <button type="submit" class="text-green-600 hover:text-green-900">
                  <i class="fas fa-check"></i> Approve
                </button>
              </form>

              <form method="POST" action="/rejectArticle">
                <input type="hidden" name="article_id" value="<?= $article['article_id'] ?>" />
                <button type="submit" class="text-red-600 hover:text-red-900">
                  <i class="fas fa-times"></i> Reject
                </button>
              </form>
            </div>
          </td>
        </tr>
      <?php endforeach; ?>

    </tbody>
  </table>
</div>
</div>
