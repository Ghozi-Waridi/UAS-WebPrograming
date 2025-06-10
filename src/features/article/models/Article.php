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

  public function getAllArticles(): array
  {
    $query = "SELECT a.id, a.title, a.content, a.picture, a.date, au.nickname, c.name as category_name
              FROM article a
              JOIN article_author aa ON a.id = aa.article_id
              JOIN author au ON aa.author_id = au.id
              JOIN article_category ac ON a.id = ac.article_id
              JOIN category c ON ac.category_id = c.id
              ORDER BY a.date DESC";
    $stmt = $this->pdo->query($query);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public function getRelatedArticles(string $category_name, int $current_article_id, int $limit = 5): array
  {
    $query = "SELECT a.id, a.title, a.picture, c.name as category_name
              FROM article a
              JOIN article_category ac ON a.id = ac.article_id
              JOIN category c ON ac.category_id = c.id
              WHERE c.name = :category_name AND a.id != :current_article_id
              ORDER BY a.date DESC
              LIMIT :limit";
    $stmt = $this->pdo->prepare($query);
    $stmt->bindParam(':category_name', $category_name, PDO::PARAM_STR);
    $stmt->bindParam(':current_article_id', $current_article_id, PDO::PARAM_INT);
    $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public function searchArticles(string $search_term): array
  {
    $query = "SELECT a.id, a.title, a.content, a.picture, a.date, au.nickname, c.name as category_name
              FROM article a
              JOIN article_author aa ON a.id = aa.article_id
              JOIN author au ON aa.author_id = au.id
              JOIN article_category ac ON a.id = ac.article_id
              JOIN category c ON ac.category_id = c.id
              WHERE a.title LIKE :search_term OR a.content LIKE :search_term
              ORDER BY a.date DESC";
    $stmt = $this->pdo->prepare($query);
    $search_term = "%{$search_term}%";
    $stmt->bindParam(':search_term', $search_term, PDO::PARAM_STR);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }
}
