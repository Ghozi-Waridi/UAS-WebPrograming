<?php

namespace Uas_ProgWeb\features\Home\models;

use PDO;

class Home
{
  private $pdo;

  public function __construct(PDO $pdo)
  {
    $this->pdo = $pdo;
  }

  public function getBeritaPilihan()
  {
    $query = "SELECT * FROM article WHERE status = 'approved' ORDER BY date DESC LIMIT 5  ;";
    $stmt = $this->pdo->query($query);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }
  public function getAllCategory()
  {
    $query = "SELECT * FROM category";
    $stmt = $this->pdo->query($query);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public function getBeritaByCategory($categoryId)
  {

    if ($categoryId == 'all') {
      $stmt = $this->pdo->query("SELECT a.id, a.title, a.content, a.picture, a.date, au.nickname, c.name as category_name
                               FROM article a
                               JOIN article_author aa ON a.id = aa.article_id
                               JOIN author au ON aa.author_id = au.id
                               JOIN article_category ac ON a.id = ac.article_id
                               JOIN category c ON ac.category_id = c.id
                               WHERE a.status = 'approved';");
      return $stmt->fetchAll();
    } else {
      $stmt = $this->pdo->prepare("SELECT a.id, a.title, a.content, a.picture, a.date, au.nickname, c.name as category_name
                                 FROM article a
                                 JOIN article_author aa ON a.id = aa.article_id
                                 JOIN author au ON aa.author_id = au.id
                                 JOIN article_category ac ON a.id = ac.article_id
                                 JOIN category c ON ac.category_id = c.id
                                 WHERE c.name = ? AND a.status = 'approved';");
      $stmt->execute([$categoryId]);
      return $stmt->fetchAll();
    }
  }
}
