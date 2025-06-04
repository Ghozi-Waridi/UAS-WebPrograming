<?php

namespace Uas_ProgWeb\features\Kategori\models;

use PDO;

class Kategori
{
  private $pdo;

  public function __construct(PDO $pdo)
  {
    $this->pdo = $pdo;
  }

  public function getAllCategory()
  {
    $query = "SELECT * FROM category";
    $stmt = $this->pdo->query($query);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public function categoryExists($categoryName)
  {
    $stmt = $this->pdo->prepare("SELECT COUNT(*) FROM category WHERE name = ?");
    $stmt->execute([$categoryName]);
    return $stmt->fetchColumn() > 0;
  }

  public function getArticleByCategory($category)
  {
    $stmt = $this->pdo->prepare("SELECT a.id, a.title, a.content, a.picture, a.date, au.nickname, c.name as category_name
                                    FROM article a
                                    JOIN article_author aa ON a.id = aa.article_id
                                    JOIN author au ON aa.author_id = au.id
                                    JOIN article_category ac ON a.id = ac.article_id
                                    JOIN category c ON ac.category_id = c.id
                                    WHERE c.name = ? AND a.status = 'approved'
                                    ");

    $stmt->bindParam(1, $category, PDO::PARAM_STR);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public function getArticleCountByCategory($category)
  {
    $stmt = $this->pdo->prepare("SELECT COUNT(*) 
                                    FROM article a
                                    JOIN article_category ac ON a.id = ac.article_id
                                    JOIN category c ON ac.category_id = c.id
                                    WHERE c.name = ? AND a.status = 'approved'");
    $stmt->execute([$category]);
    return $stmt->fetchColumn();
  }
}
