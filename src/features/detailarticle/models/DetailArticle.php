<?php

namespace Uas_ProgWeb\features\DetailArticle\models;

use PDO;

class DetailArticle
{
  private $pdo;

  public function __construct(PDO $pdo)
  {
    $this->pdo = $pdo;
  }



  public function getArticleById($id)
  {
    $query = "SELECT a.title, a.content, a.picture, a.date, au.nickname, c.name as category_name
              FROM article a
              JOIN article_author aa ON a.id = aa.article_id
              JOIN author au ON aa.author_id = au.id
              JOIN article_category ac ON a.id = ac.article_id
              JOIN category c ON ac.category_id = c.id 
              WHERE a.id = :id";

    // Debug: Tampilkan query yang akan dijalankan
//    echo "Executing query: " . $query . "<br>";

    $stmt = $this->pdo->prepare($query);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();

    // Debug: Tampilkan hasil query
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
//    echo "<pre>";
//    print_r($result);
//    echo "</pre>";

    return $result;
  }
}
