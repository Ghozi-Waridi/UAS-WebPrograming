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


    public function index($id = null)
    {
        // Debug: Tampilkan ID yang diterima
//        echo "Received ID: " . $id . "<br>";

        // Memastikan ID artikel valid
        if (!$id || !is_numeric($id)) {
            http_response_code(400);
//            echo "400 Bad Request: ID artikel tidak ditemukan";
            return;
        }

        // Ambil artikel berdasarkan ID
        $article = $this->detailModel->getArticleById($id);

        // Debug: Cek apakah artikel ditemukan
        if (!$article) {
            http_response_code(404);
//            echo "404 Not Found: Artikel tidak ditemukan";
            return;
        }


        // Debug: Tampilkan artikel yang ditemukan
//        echo "<pre>";
//        print_r($article);
//        echo "</pre>";





        // Tampilkan tampilan artikel
        require __DIR__ . '/../views/DetailArticleView.php';
    }

}
