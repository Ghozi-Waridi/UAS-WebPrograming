<?php
namespace Uas_ProgWeb\features\Article\controllers;
use PDO;
use Uas_ProgWeb\features\Article\models\Article;

class ArticleController
{
  private $articleModel;

  public function __construct(PDO $pdo)
  {
    $this->articleModel = new Article($pdo);
  }

  public function index()
  {
    $articles = $this->articleModel->getAllArticles();
    $relatedArticles = [];
    if (!empty($articles)) {
      // Get related articles based on the first article's category
      $relatedArticles = $this->articleModel->getRelatedArticles(
        $articles[0]['category_name'],
        $articles[0]['id']
      );
    }
    require __DIR__ . '/../views/ArticleView.php';
  }

  public function search()
  {
    $search_term = isset($_GET['q']) ? trim($_GET['q']) : '';
    if (!empty($search_term)) {
      $articles = $this->articleModel->searchArticles($search_term);
    } else {
      $articles = $this->articleModel->getAllArticles();
    }
    $relatedArticles = [];
    if (!empty($articles)) {
      $relatedArticles = $this->articleModel->getRelatedArticles(
        $articles[0]['category_name'],
        $articles[0]['id']
      );
    }
    require __DIR__ . '/../views/ArticleView.php';
  }
}
