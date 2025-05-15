<?php

namespace Uas_ProgWeb\features\Profile\models;

use PDO;
use \IntlDateFormatter;
use Exception;
use Uas_ProgWeb\features\Home\models\Home;

class Profile
{
  private $pdo;

  public function __construct(PDO $pdo)
  {
    $this->pdo = $pdo;
  }

  public function getUser($user_id)
  {
    $query = "SELECT au.nickname, au.email, au.password, au.bio, au.url, au.image FROM author au WHERE au.id = ?;";
    $stmt =  $this->pdo->prepare($query);
    $stmt->execute([$user_id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
  }

  public function getArticle($user_id)
  {
    $query = "SELECT a.id, a.title, a.content, a.picture, a.date, a.status
    FROM article a
              JOIN article_author aa ON a.id = aa.article_id
              JOIN author au ON aa.author_id = au.id
              WHERE au.id = ?;";
    $stmt =  $this->pdo->prepare($query);
    $stmt->execute([$user_id]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public function updateProfile($user_id, $nickname, $email, $bio, $url, $password, $image)
  {
    if (empty($password)) {
      $query = "UPDATE author SET nickname = ?, email = ?, bio = ?, url = ?, image = ? WHERE id = ?";
      $stmt =  $this->pdo->prepare($query);
      $stmt->execute([$nickname, $email, $bio, $url, $image, $user_id]);
    }
  }
  public function updatePassword($user_id, $password)
  {
    $query = "UPDATE author SET password = ? WHERE id = ?";
    $stmt =  $this->pdo->prepare($query);
    $stmt->execute([$password, $user_id]);
  }
  public function getCategory()
  {
    $query = "SELECT * FROM category";
    $stmt =  $this->pdo->prepare($query);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }


  public function saveArticle($title, $content, $picture, $category_id)
  {
    print($category_id);
    echo $category_id;
    // Cek jika category_id tidak NULL atau kosong
    if (empty($category_id)) {
      throw new \Exception('category_id cannot be null or empty');
    }

    // Menggunakan IntlDateFormatter untuk memformat tanggal dengan bahasa Indonesia
    $fmt = new IntlDateFormatter('id_ID', IntlDateFormatter::LONG, IntlDateFormatter::NONE);
    $fmt->setPattern('dd MMMM yyyy'); // Format '10 Mei 2025'

    // Mendapatkan tanggal sekarang dalam format yang diinginkan
    $date = $fmt->format(new \DateTime());

    // Menyimpan artikel ke database
    $query = "INSERT INTO article (title, content, picture, date) VALUES (?, ?, ?, ?)";
    $stmt = $this->pdo->prepare($query);
    $stmt->execute([$title, $content, $picture, $date]);

    // Mendapatkan ID artikel yang baru dimasukkan
    $article_id = $this->pdo->lastInsertId();

    $this->saveArticleCategory($article_id, $category_id);

    return $article_id;
  }


  /// Butuh Memasukan data ke tabel relasinya juga
  public function saveArticleAuthor($article_id, $user_id)
  {
    $query = "INSERT INTO article_author (article_id, author_id) VALUES (?, ?)";
    $stmt = $this->pdo->prepare($query);
    $stmt->execute([$article_id, $user_id]);
  }
  public function saveArticleCategory($article_id, $category_id)
  {
    $query = "INSERT INTO article_category (article_id, category_id) VALUES (?, ?)";
    $stmt = $this->pdo->prepare($query);
    $stmt->execute([$article_id, $category_id]);
  }
  public function getIdByCategory($category)
  {
    $query = "SELECT id FROM category WHERE name = ?";
    $stmt =  $this->pdo->prepare($query);
    $stmt->execute([$category]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
  }
  public function getIdByArticle($title)
  {
    $query = "SELECT id FROM article WHERE title = ?";
    $stmt =  $this->pdo->prepare($query);
    $stmt->execute([$title]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
  }
  public function updateCategory($article_id, $category_id, $value)
  {
    $query = "UPDATE article_category SET category_id = ? WHERE article_id = ?";
    $stmt = $this->pdo->prepare($query);
    $stmt->execute([$category_id, $article_id]);
  }
  public function updateArticle($articleId, $title, $content, $fileName)
  {
    try {
      $query = "UPDATE article SET title = ?, content = ?, picture = COALESCE(?, picture) WHERE id = ?";
      $stmt = $this->pdo->prepare($query);
      $stmt->execute([$title, $content, $fileName, $articleId]);
      return true;
    } catch (\PDOException $e) {
      error_log("Error updating article: " . $e->getMessage());
      throw new Exception("Gagal memperbarui artikel: " . $e->getMessage());
    }
  }
}
