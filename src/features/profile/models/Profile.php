<?php

namespace Uas_ProgWeb\features\Profile\models;

use PDO;
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
    $query = "SELECT a.id, a.title, a.content, a.picture, a.date
    FROM article a
              JOIN article_author aa ON a.id = aa.article_id
              JOIN author au ON aa.author_id = au.id
              WHERE au.id = ?;";
    $stmt =  $this->pdo->prepare($query);
    $stmt->execute([$user_id]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public function updateProfile($user_id, $nickname, $email, $bio, $url, $password)
  {
    if (empty($password)) {
      $query = "UPDATE author SET nickname = ?, email = ?, bio = ?, url = ? WHERE id = ?";
      $stmt =  $this->pdo->prepare($query);
      $stmt->execute([$nickname, $email, $bio, $url, $user_id]);
    } 
  }
  public function updatePassword($user_id, $password)
  {
    $query = "UPDATE author SET password = ? WHERE id = ?";
    $stmt =  $this->pdo->prepare($query);
    $stmt->execute([$password, $user_id]);
    
  }
}
