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
    require '/../views/KategoriView.php';
  }

  public function store()
  {

    if (isset($_POST['category'])) {
      $category = $_POST['category'];
      $articles = $this->kategoriModel->getArticleByCategory($category);
      require '/../views/listArtikelView.php';
    } else {

      echo "No category selected!";
    }
  }
}
