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

    public function getPendingApproval()
    {
        $stmt = $this->pdo->query("SELECT COUNT(*) FROM article WHERE status = 'pending'");
        return $stmt->fetchColumn();
    }

    public function getTotalArticleByAuthor()
    {
        $stmt = $this->pdo->prepare(
            "SELECT 
                au.nickname, 
                au.email, 
                au.image, 
                COUNT(a.id) AS total_articles
            FROM author au
            LEFT JOIN article_author aa ON au.id = aa.author_id
            LEFT JOIN article a ON aa.article_id = a.id
            GROUP BY au.id"
        );
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getArticleManagement()
    {
        $stmt = $this->pdo->query("
            SELECT 
                a.id AS article_id,
                a.title,
                a.date,
                a.status,
                au.nickname AS author_name,
                au.email AS author_email,
                au.image AS author_image,
                c.name AS category_name,
                c.description AS category_description
            FROM 
                article a
            JOIN 
                article_author aa ON a.id = aa.article_id
            JOIN 
                author au ON aa.author_id = au.id
            LEFT JOIN 
                article_category ac ON a.id = ac.article_id
            LEFT JOIN 
                category c ON ac.category_id = c.id
            ORDER BY 
                a.date DESC
        ");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function approveArticle($articleId)
    {
        $stmt = $this->pdo->prepare("UPDATE article SET status = 'approved' WHERE id = :article_id AND status = 'pending'");
        $stmt->bindParam(':article_id', $articleId, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function deleteArticle($articleId)
    {
        try {
            // Begin transaction
            $this->pdo->beginTransaction();

            // Delete from article_category (many-to-many relationship with category)
            $stmt = $this->pdo->prepare("DELETE FROM article_category WHERE article_id = :article_id");
            $stmt->bindParam(':article_id', $articleId, PDO::PARAM_INT);
            $stmt->execute();

            // Delete from article_author (many-to-many relationship with author)
            $stmt = $this->pdo->prepare("DELETE FROM article_author WHERE article_id = :article_id");
            $stmt->bindParam(':article_id', $articleId, PDO::PARAM_INT);
            $stmt->execute();

            // Delete the article itself
            $stmt = $this->pdo->prepare("DELETE FROM article WHERE id = :article_id");
            $stmt->bindParam(':article_id', $articleId, PDO::PARAM_INT);
            $stmt->execute();


            $this->pdo->commit();

            return true; // Return true if deletion is successful
        } catch (\PDOException $e) {
            // Rollback transaction on error
            $this->pdo->rollBack();
            return false; // Return false if deletion fails
        }
    }
}
