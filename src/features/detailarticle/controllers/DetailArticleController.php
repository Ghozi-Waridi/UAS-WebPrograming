<?php

namespace Uas_ProgWeb\features\DetailArticle\controllers;

use PDO;
use Uas_ProgWeb\features\DetailArticle\models\DetailArticle;

class DetailArticleController
{
    private $detailModel;

    public function __construct(PDO $pdo)
    {
        $this->detailModel = new DetailArticle($pdo);
    }

    public function index($id = null, $searchQuery = null)
    {
        // Ambil parameter pencarian dari query string
        $searchQuery = $_GET['query'] ?? null;

        // Jika ada query pencarian, tampilkan hasil pencarian
        if ($searchQuery) {
            $searchResults = $this->detailModel->searchArticles($searchQuery);
            require __DIR__ . '/../views/DetailArticleView.php';
            return;
        }

        // Memastikan ID artikel valid
        if (!$id || !is_numeric($id)) {
            http_response_code(400);
            return;
        }

        // Ambil artikel berdasarkan ID
        $article = $this->detailModel->getArticleById($id);

        // Cek apakah artikel ditemukan
        if (!$article) {
            http_response_code(404);
            return;
        }

        // Ambil artikel terkait berdasarkan kategori
        $relatedArticles = $this->detailModel->getRelatedArticles($article['category_name'], $id);

        // Tampilkan tampilan artikel
        require __DIR__ . '/../views/DetailArticleView.php';
    }
}
