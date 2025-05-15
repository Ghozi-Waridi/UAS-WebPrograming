<?php

namespace Uas_ProgWeb\features\Home\controllers;

use PDO;
use Uas_ProgWeb\features\Home\models\Home;

class HomeController
{
  private $homeModel;


  public function __construct(PDO $pdo)
  {
    $this->homeModel = new Home($pdo);
  }

  public function index()
  {
    $berita = $this->homeModel->getBeritaPilihan();
    $beritaCarousel = $this->homeModel->getBeritaCarousel();
    $category2 = $this->homeModel->getAllCategory();
    $beritaByCategory = null;
    $category = 'all';
    if (isset($_POST['category'])) {
      $category = $_POST['category'];
      $beritaByCategory = $this->homeModel->getBeritaByCategory($category);
    } else {
      $beritaByCategory = $this->homeModel->getBeritaByCategory($category);
    }

    require __DIR__ . '/../views/HomeView.php';
  }


  public function store() {}
}
