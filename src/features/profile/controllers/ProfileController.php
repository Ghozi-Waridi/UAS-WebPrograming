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

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $title = isset($_POST['judul']) ? $_POST['judul'] : '';
      $content = isset($_POST['editor']) ? $_POST['editor'] : '';
      $picture = isset($_FILES['gambar']) ? $_FILES['gambar'] : null;
      $category = isset($_POST['kategori']) ? $_POST['kategori'] : '';


      if (empty($title) || empty($content)) {
        throw new Exception("Judul dan Konten tidak boleh kosong.");
      }

      if ($picture && $picture['error'] == 0) {
        $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];
        $maxSize = 2 * 1024 * 1024;
        $fileExtension = strtolower(pathinfo($picture['name'], PATHINFO_EXTENSION));

        if (!in_array($fileExtension, $allowedExtensions)) {
          throw new Exception("Ekstensi file tidak valid. Hanya file gambar JPG, PNG, dan GIF yang diperbolehkan.");
        }

        if ($picture['size'] > $maxSize) {
          throw new Exception("Ukuran file gambar terlalu besar. Maksimum 2MB.");
        }


        $fileName = time() . '_' . basename($picture['name']);
        $uploadDir = 'uploads/';
        $targetFile = $uploadDir . $fileName;


        if (!move_uploaded_file($picture['tmp_name'], $targetFile)) {
          throw new Exception("Gagal mengunggah gambar.");
        }
      } else {

        $fileName = NULL;
      }
      $categoryId = $this->profileModel->getIdByCategory($category);
      $articleId = $this->profileModel->saveArticle($title, $content, $fileName);
      $this->profileModel->saveArticleAuthor($articleId, $_SESSION['user_id']);
      $this->profileModel->saveArticleCategory($articleId, $categoryId['id']);
      header("location: /profile");

      return $articleId;
    } else {
      throw new Exception("Hanya metode POST yang diterima.");
    }
  }
}
