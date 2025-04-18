<?php
namespace Uas_ProgWeb\features\Article\models;
use PDO;
class Article
{
  private $pdo;

  public function __construct(PDO $pdo)
  {
    $this->pdo = $pdo;
  }

  public function getAllArticle(): array
  {
    $query = "SELECT a.title, a.content, a.picture, a.date, au.nickname, c.name as category_name
              FROM article a
              JOIN article_author aa ON a.id = aa.article_id
              JOIN author au ON aa.author_id = au.id
              JOIN article_category ac ON a.id = ac.article_id
              JOIN category c ON ac.category_id = c.id";
    $stmt = $this->pdo->query($query);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }
}
