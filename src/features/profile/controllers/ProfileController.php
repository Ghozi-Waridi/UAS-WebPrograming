<?php

namespace Uas_ProgWeb\features\Profile\controllers;

use Exception;
use PDO;
use Uas_ProgWeb\features\Profile\models\Profile;

class ProfileController
{

  private $profileModel;



  public function __construct(PDO $pdo)
  {
    $this->profileModel = new Profile($pdo);
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
    $category = $this->profileModel->getCategory();
    $profileUser = $this->profileModel->getUser($user_id);
    $profileArticle = $this->profileModel->getArticle($user_id);

    require __DIR__ . '/../views/ProfileView.php';
  }

  public function store()
  {
    if (!isset($_SESSION)) {
      session_start();
    }


    $user_id = $_SESSION['user_id'];


    $nickname = isset($_POST['name']) ? $_POST['name'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $bio = isset($_POST['bio']) ? $_POST['bio'] : '';
    $url = isset($_POST['url']) ? $_POST['url'] : '';
    $target = "uploads/profile/";
    $target = $target . basename($_FILES['profile-picture']['name']);
    move_uploaded_file($_FILES['profile-picture']['tmp_name'], $target);
    $_SESSION['imageProfile'] = $_FILES['profile-picture']['name'];
    $password = "";

    $currentpass = isset($_POST['currentpass']) ? $_POST['currentpass'] : '';
    $newPass = isset($_POST['newpass']) ? $_POST['newpass'] : '';
    $confirmPass = isset($_POST['confirmpass']) ? $_POST['confirmpass'] : '';


    if (isset($_POST['savePass'])) {

      if (empty($currentpass) || empty($newPass) || empty($confirmPass)) {
        $_SESSION['error'] = "Semua kolom password harus diisi jika Anda ingin mengubah password.";
        header('location: /profile');
        exit();
      }
      if ($newPass !== $confirmPass) {
        $_SESSION['error'] = "Password tidak sama.";
        header('location: /profile');
        exit();
      }
      if ($currentpass === $newPass) {
        $_SESSION['error'] = "Password tidak boleh sama dengan password lama.";
        header('location: /profile');
        exit();
      }
      $password = password_hash($newPass, PASSWORD_BCRYPT);
      $this->profileModel->updatePassword($user_id, $password);

      header('location: /profile');
      exit();
    }

    if (isset($_POST['saveProfile'])) {
      if (empty($nickname)) {
        $_SESSION['error2'] = "Nickname tidak boleh kosong.";
        header('location: /profile');
        exit();
      }

      if (empty($email)) {
        $_SESSION['error2'] = "Email tidak boleh kosong.";
        header('location: /profile');
        exit();
      }
      $this->profileModel->updateProfile($user_id, $nickname, $email, $bio, $url, $password, $_FILES['profile-picture']['name']);

      header('location: /profile');
      exit();
    }
  }

  public function uploadArtikel()
  {
    if (!isset($_SESSION)) {
      session_start();
    }

    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
      throw new Exception("Hanya metode POST yang diterima.");
    }

    $articleId = isset($_POST['article_id']) ? trim($_POST['article_id']) : '';
    $title = isset($_POST['judul']) ? trim($_POST['judul']) : '';
    $content = isset($_POST['editor']) ? trim($_POST['editor']) : '';
    $picture = isset($_FILES['gambar']) ? $_FILES['gambar'] : null;
    $category = isset($_POST['kategori']) ? trim($_POST['kategori']) : '';
    $errors = [];

    // Validate required fields
    if (empty($title)) {
      $errors[] = "Judul tidak boleh kosong.";
    }
    if (empty($content)) {
      $errors[] = "Konten tidak boleh kosong.";
    }
    if (empty($category)) {
      $errors[] = "Kategori tidak boleh kosong.";
    }

    // Validate image if provided
    $fileName = null;
    if ($picture && $picture['error'] === UPLOAD_ERR_OK) {
      $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];
      $maxSize = 2 * 1024 * 1024; // 2MB
      $fileExtension = strtolower(pathinfo($picture['name'], PATHINFO_EXTENSION));

      if (!in_array($fileExtension, $allowedExtensions)) {
        $errors[] = "Ekstensi file tidak valid. Hanya file JPG, PNG, dan GIF yang diperbolehkan.";
      }
      if ($picture['size'] > $maxSize) {
        $errors[] = "Ukuran file gambar terlalu besar. Maksimum 2MB.";
      }

      if (empty($errors)) {
        $fileName = time() . '_' . basename($picture['name']);
        $uploadDir = 'Uploads/';
        $targetFile = $uploadDir . $fileName;

        if (!move_uploaded_file($picture['tmp_name'], $targetFile)) {
          $errors[] = "Gagal mengunggah gambar.";
        }
      }
    } elseif ($picture && $picture['error'] !== UPLOAD_ERR_NO_FILE) {
      $errors[] = "Error saat mengunggah gambar.";
    }

    // Validate category
    $categoryId = $category;
    if (!$categoryId || !isset($categoryId)) {
      $errors[] = "Kategori tidak valid.";
    }


    if (!empty($errors)) {
      $_SESSION['erroreditor'] = implode(" ", $errors);
      header("Location: /profile");
      exit;
    }

    if ($articleId) {
      print("Melakukan Update");
      $this->profileModel->updateArticle($articleId, $title, $content, $fileName, $categoryId);
      $this->profileModel->updateCategory($articleId, $categoryId, $category);
    } else {
      print("Melakukan Penambahan Data");
      $articleId = $this->profileModel->saveArticle($title, $content, $fileName, $categoryId);
      $this->profileModel->saveArticleAuthor($articleId, $_SESSION['user_id']);
    }

    header("Location: /profile");
    exit;

    return $articleId;
  }

}
