<?php



namespace Uas_ProgWeb\features\Dasboard\controllers;

use PDO;
use Uas_ProgWeb\features\Dasboard\models\Dasboard;

class DasboardController
{
  private $dasboardModel;
  private $pdo;

  public function __construct(PDO $pdo)
  {
    $this->pdo = $pdo;
    $this->dasboardModel = new Dasboard($pdo);
  }

  public function index()
  {
    $page = 'dashboard'; // default page
    require __DIR__ . '/../views/DasboardView.php';
  }

  public function loadContent($page)
  {
      $viewMap = [
      'userManagement' => '/../views/UserManagementView.php',
      'articleApproval' => '/../views/ArticleApprovalView.php',
      'articleManagement' => '/../views/ArticleManagementView.php',
      'categories' => '/../views/CategoriesView.php',
    ];
      $view = $viewMap[$page] ?? '/../views/DasboardContentView.php';
    require __DIR__ . $view;
  }

  public function logout()
  {

    session_destroy();
    header('Location: /login');
    exit;
  }
}
