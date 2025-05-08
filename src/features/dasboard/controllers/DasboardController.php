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
    session_start();

    header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
    header("Pragma: no-cache");
    header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");


    $user_id = $_SESSION['user_id'];

    if (!isset($user_id)) {
      header('location: /login');
      exit;
    }
    $page = 'dashboard';
    $totalUsers = $this->dasboardModel->getTotalUsers();
    $totalArticles = $this->dasboardModel->getTotalArticles();
    $pendingApproval = $this->dasboardModel->getPendingApproval();

    require __DIR__ . '/../views/DasboardView.php';
  }

  public function loadContent($page)
  {
    $totalUsers = $this->dasboardModel->getTotalUsers();
    $totalArticles = $this->dasboardModel->getTotalArticles();
    $pendingApproval = $this->dasboardModel->getPendingApproval();
    $totalArticleByAuthor = $this->dasboardModel->getTotalArticleByAuthor();
    $articleManagement = $this->dasboardModel->getArticleManagement();
    $viewMap = [
      'userManagement' => '/../views/UserManagementView.php',
      'articleApproval' => '/../views/ArticleApprovalView.php',
      'articleManagement' => '/../views/ArticleManagementView.php',
      'categories' => '/../views/CategoriesView.php',
    ];
    $view = $viewMap[$page] ?? '/../views/DasboardContentView.php';
    require __DIR__ . $view;
  }
  public function approveArticle()
  {
    $articleId = $_POST['article_id'] ?? null;
    // Call the model method to approve the article
    $isApproved = $this->dasboardModel->approveArticle($articleId);

    if ($isApproved) {
      // Redirect or show success message
      header('Location: /dashboard'); // Assuming you want to go back to the article approval page
      exit;
    } else {
      // Handle failure (maybe show an error message)
      echo "Error approving the article.";
    }
  }
  public function logout()
  {

    session_destroy();
    header('Location: /login');
    exit;
  }
}
