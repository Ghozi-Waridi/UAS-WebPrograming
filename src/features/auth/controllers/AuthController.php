<?php

namespace Uas_ProgWeb\features\Auth\controllers;

use PDO;
use PhpParser\Node\Stmt\Else_;
use Uas_ProgWeb\features\Auth\models\Auth;

class AuthController
{
  private $authModel;


  public function __construct(PDO $pdo)
  {
    $this->authModel = new Auth($pdo);
  }

  public function index()
  {
    require __DIR__ . '/../views/AuthView.php';
  }

  public function showSingupForm()
  {
    session_start();
    require __DIR__ . '/../views/SingUpView.php';
  }


  public function showLoginForm()
  {
    if (!isset($_SESSION)) {
      session_start();
    }


    if (isset($_SESSION['user_id'])) {
      header('Location: /');
      exit;
    }
    require __DIR__ . '/../views/LoginView.php';
  }

  public function login()
  {
    if (session_status() == PHP_SESSION_NONE) {
      session_start();
    }


    if (isset($_SESSION['user_id'])) {
      header('Location: /');
      exit;
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $email = $_POST['email'];
      $password = $_POST['password'];


      $user = $this->authModel->getUserByEmail($email);
      if (!$user) {
        $_SESSION['error'] = 'Email tidak ditemukan!';
        header('Location: /login');
        exit;
      }
      $_SESSION['imageProfile'] = $user['image'];
      if ($user) {
        if ($user['email'] == "admin@gmail.com") {

          if (password_verify($password, $user['password'])) {

            /* if ($user['password'] === $password) { */
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['email'] = $user['email'];


            header('Location: /dashboard');
            exit;
          } else {
            $_SESSION['error'] = 'Password salah!';
          }
        } else {

          if (password_verify($password, $user['password'])) {

            /* if ($user['password'] === $password) { */
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['email'] = $user['email'];


            header('Location: /profile');
            exit;
          } else {
            $_SESSION['error'] = 'Password salah!';
          }
        }
      }
    }
    $this->showLoginForm();
  }


  public function singup()

  {
    if (session_status() == PHP_SESSION_NONE) {
      session_start();
    }



    $nickname = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

      if (empty($nickname) || empty($email) || empty($password) || empty($confirm_password)) {
        $_SESSION['error'] = "Semua field harus diisi.";
        header('Location: /singup');
        exit;
      }

      if ($password !== $confirm_password) {
        $_SESSION['error'] = "Password harus sama.";
        header('Location: /singup');
        exit;
      }

      $existingUser = $this->authModel->getUserByEmail($email);
      if ($existingUser) {
        $_SESSION['error'] = "Email sudah digunakan!";
        header('Location: /singup');
        exit;
      }

      $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

      $result = $this->authModel->singup($nickname, $email, $hashedPassword);
      if ($result === "Signup successful!") {
        $_SESSION['success'] = "Registrasi berhasil! Silakan login.";
        header("Location: /login");
        exit;
      } else {
        $_SESSION['error'] = "Terjadi kesalahan saat registrasi!";
        header("Location: /singup");
        exit;
      }
    }
  }

  public function logout()
  {
    session_start();
    session_unset();
    session_destroy();
    if (isset($_COOKIE[session_name()])) {
      setcookie(session_name(), '', time() - 3600, '/');
    }

    header('Location: /login');
    exit;
  }
}
