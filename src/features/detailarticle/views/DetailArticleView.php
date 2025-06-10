<?php ob_start(); ?>

<div class="container mx-auto max-w-7xl px-6 py-10 mt-10">
    <div class="flex flex-col lg:flex-row gap-8">
             <div class="lg:w-2/3">
                   <div class="mb-8">
                <form action="/article" method="GET" class="flex">
                    <input type="text" name="query" placeholder="Cari artikel..." 
                           value="<?= htmlspecialchars($searchQuery ?? ''); ?>"
                           class="w-full px-4 py-2 border border-gray-300 rounded-l-lg focus:outline-none focus:ring-2 focus:ring-indigo-600">
                    <button type="submit" 
                            class="px-4 py-3 bg-indigo-600 text-white rounded-r-lg hover:bg-indigo-700 transition">
                        Cari
                    </button>
                </form>
            </div>

            <?php if ($searchQuery && !empty($searchResults)): ?>
                            <h2 class="text-2xl font-semibold text-gray-800 mb-4">Hasil Pencarian untuk "<?= htmlspecialchars($searchQuery); ?>"</h2>
                <div class="space-y-4">
                    <?php foreach ($searchResults as $result): ?>
                        <div class="bg-white shadow-md rounded-lg p-4 flex gap-4">
                            <img src="<?= htmlspecialchars("/Uploads/" . $result['picture']); ?>" alt="Image" 
                                 class="w-24 h-24 object-cover rounded-lg">
                            <div>
                                <a href="/article/<?= htmlspecialchars($result['id']); ?>" 
                                   class="text-lg font-semibold text-gray-800 hover:text-indigo-600">
                                    <?= htmlspecialchars($result['title']); ?>
                                </a>
                                <div class="text-sm text-gray-500 mt-1">
                                    <span><?= htmlspecialchars($result['nickname']); ?></span> •
                                    <span><?= htmlspecialchars($result['date']); ?></span> •
                                    <span><?= htmlspecialchars($result['category_name']); ?></span>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php elseif ($searchQuery && empty($searchResults)): ?>
                <p class="text-gray-500">Tidak ada artikel yang cocok dengan pencarian "<?= htmlspecialchars($searchQuery); ?>"</p>
            <?php else: ?>
                           <article class="bg-white shadow-lg rounded-xl p-6 mb-10">
                    <header class="mb-6">
                        <h1 class="text-4xl font-bold text-gray-800 tracking-wide mb-2"><?= htmlspecialchars($article['title']); ?></h1>
                        <div class="text-sm text-gray-500 mb-4">
                            <span><?= htmlspecialchars($article['nickname']); ?></span> •
                            <span><?= htmlspecialchars($article['date']); ?></span> •
                            <span><?= htmlspecialchars($article['category_name']); ?></span>
                        </div>
                    </header>
                    <div class="mb-6">
                        <img src="<?= htmlspecialchars("/Uploads/" . $article['picture']); ?>" alt="Image" 
                             class="w-full h-96 object-cover rounded-lg shadow-lg transition-transform transform hover:scale-105 hover:shadow-2xl">
                    </div>
                    <div class="text-lg text-gray-700 leading-relaxed space-y-4">
                        <?php
                        $content = $article['content'];
                        $content = preg_replace("/< DOSp>/", "<p class='text-lg leading-relaxed text-gray-800 mb-4'>", $content);
                        $content = preg_replace("/<h1>/", "<h1 class='text-3_pts

System: **3xl text-gray-900 font-bold mt-6'>", $content);
                        $content = preg_replace("/<a>/", "<a class='text-blue-600 hover:text-blue-800'>", $content);
                        $content = preg_replace("/<ul>/", "<ul class='list-disc pl-6'>", $content);
                        $content = preg_replace("/<li>/", "<li class='mb-2'>", $content);
                        echo $content;
                        ?>
                    </div>
                    <footer class="mt-10 text-center text-gray-500">
                        <p>© 2025 UIN Maulana Malik Ibrahim Malang</p>
                    </footer>
                </article>
                <a href="/" class="inline-block px-6 py-3 bg-indigo-600 text-white font-semibold rounded-lg hover:bg-indigo-700 transition">
                    Kembali ke Daftar Artikel
                </a>
            <?php endif; ?>
        </div>

              <div class="lg:w-1/3">
            <h2 class="text-2xl font-semibold text-gray-800 mb-4">Artikel Terkait</h2>
            <div class="space-y-4">
                <?php if (empty($relatedArticles)): ?>
                    <p class="text-gray-500">Tidak ada artikel terkait.</p>
                <?php else: ?>
        <?php foreach ($relatedArticles as $related): ?>

                        <div class="bg-white shadow-md rounded-lg p-4 flex gap-4">
                            <img src="<?= htmlspecialchars("/Uploads/" . $related['picture']); ?>" alt="Related Image" 
                                 class="w-24 h-24 object-cover rounded-lg">
                            <div>
                                <a href="/detail/<?= htmlspecialchars($related['id']); ?>" 
                                   class="text-lg font-semibold text-gray-800 hover:text-indigo-600">
                                    <?= htmlspecialchars($related['title']); ?>
                                </a>
                                <div class="text-sm text-gray-500 mt-1">
                                    <span><?= htmlspecialchars($related['nickname']); ?></span> •
                                    <span><?= htmlspecialchars($related['date']); ?></span>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<?php $detail = ob_get_clean(); ?>
<?php require __DIR__ . '/../../../main.php'; ?>
