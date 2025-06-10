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
        $query = "SELECT a.id, a.title, a.content, a.picture, a.date, au.nickname, c.name as category_name
                  FROM article a
                  JOIN article_author aa ON a.id = aa.article_id
                  JOIN author au ON aa.author_id = au.id
                  JOIN article_category ac ON a.id = ac.article_id
                  JOIN category c ON ac.category_id = c.id 
                  WHERE a.id = :id";

        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getRelatedArticles($categoryName, $currentArticleId)
    {
        $query = "SELECT a.id, a.title, a.picture, a.date, au.nickname
                  FROM article a
                  JOIN article_author aa ON a.id = aa.article_id
                  JOIN author au ON aa.author_id = au.id
                  JOIN article_category ac ON a.id = ac.article_id
                  JOIN category c ON ac.category_id = c.id
                  WHERE c.name = :category_name AND a.id != :current_id
                  LIMIT 5";

        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':category_name', $categoryName, PDO::PARAM_STR);
        $stmt->bindParam(':current_id', $currentArticleId, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function searchArticles($searchQuery)
    {
        $query = "SELECT a.id, a.title, a.picture, a.date, au.nickname, c.name as category_name
                  FROM article a
                  JOIN article_author aa ON a.id = aa.article_id
                  JOIN author au ON aa.author_id = au.id
                  JOIN article_category ac ON a.id = ac.article_id
                  JOIN category c ON ac.category_id = c.id
                  WHERE a.title LIKE :search_query OR a.content LIKE :search_query
                  LIMIT 10";

        $stmt = $this->pdo->prepare($query);
        $searchTerm = '%' . $searchQuery . '%';
        $stmt->bindParam(':search_query', $searchTerm, PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
