<?php

namespace Uas_ProgWeb\features\kategori\controllers;

use PDO;
use Uas_ProgWeb\features\Kategori\models\Kategori;

class KategoriController
{
  private $kategoriModel;

  public function __construct(PDO $pdo)
  {
    $this->kategoriModel = new Kategori($pdo);
  }

  public function index()
  {
    $category = $this->kategoriModel->getAllCategory();
    /* echo gettype($category); */
    require __DIR__ . '/../views/KategoriView.php';
  }

  public function showArticlesByCategory($categoryName)
  {
    // Decode URL-encoded category name if needed
    $categoryName = urldecode($categoryName);
    /* echo "Category: $categoryName\n"; */

    // Validate category exists
    /* $categoryExists = $this->kategoriModel->categoryExists($categoryName); */
    /* echo "Category exists: " . ($categoryExists ). "\n"; */
    /* if (!$categoryExists) { */
    /*   echo "Category not found!"; */
    /*   return; */
    /* } */


    /* $itemsPerPage = 5; */
    /* $currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1; */
    /* echo  "Current page: $currentPage\n"; */
    /* $currentPage = max(1, $currentPage); */
    /* echo "Current page after max check: $currentPage\n"; */
    /* $offset = ($currentPage - 1) * $itemsPerPage; */
    /* echo "offset $offset"; */

    
    $articles = $this->kategoriModel->getArticleByCategory($categoryName);
    /* echo gettype($articles); */
    /* print_r($articles); */
    /* $totalArticles = $this->kategoriModel->getArticleCountByCategory($categoryName); */
    /* print_r($totalArticles); */
    /* $totalPages = ceil($totalArticles / $itemsPerPage); */
    /* print_r($totalPages); */

    require __DIR__ . '/../views/listArtikelView.php';
  }
}
