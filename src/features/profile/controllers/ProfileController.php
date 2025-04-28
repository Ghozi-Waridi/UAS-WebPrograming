<?php

namespace Uas_ProgWeb\features\Profile\controllers;

use PDO;
use Uas_ProgWeb\features\Home\models\Home;

class ProfileController
{

  private $homeModel;


  public function __construct(PDO $pdo)
  {
    $this->homeModel = new Home($pdo);
  }

  public function index()
  {


    session_start();

    header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
    header("Pragma: no-cache");
    header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");


    if (!isset($_SESSION['user_id'])) {
      header('location: /login');
      exit;
    }
    require __DIR__ . '/../views/ProfileView.php';
  }
}
