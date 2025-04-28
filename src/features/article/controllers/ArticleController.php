<?php
namespace Uas_ProgWeb\features\Article\controllers;
use Uas_ProgWeb\features\article\models\Article;

use PDO;
use Uas_ProgWeb\features\Article\models\Article as ModelsArticle;

class ArticleController
{
  private $articxxleModel;

  public function __construct(PDO $pdo)
  {
    $this->articleModel = new Article($pdo);
  }

  public function index()
  {
    $article = $this->articleModel->getAllArticle();
    require __DIR__ . '/../views/ArticleView.php';
  }

}
