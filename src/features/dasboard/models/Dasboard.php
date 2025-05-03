<?php

namespace Uas_ProgWeb\features\Dasboard\models;

use PDO;

class Dasboard
{
  private $pdo;

  public function __construct(PDO $pdo)
  {
    $this->pdo = $pdo;
  }
  public function getTotalUsers()
  {
    $stmt = $this->pdo->query("SELECT COUNT(*) FROM author");
    return $stmt->fetchColumn();
  }
  public function getTotalArticles()
  {
    $stmt = $this->pdo->query("SELECT COUNT(*) FROM article");
    return $stmt->fetchColumn();
  }

}
