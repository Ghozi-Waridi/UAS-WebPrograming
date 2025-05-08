<?php

namespace Uas_ProgWeb\features\EditorArticle\controllers;


class EditorArticleController
{



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

    require __DIR__ . '/../views/EditorArticleView.php';
  }

  public function store() {}
}
