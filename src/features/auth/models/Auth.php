<?php

namespace Uas_ProgWeb\features\Auth\models;

use PDO;

class Auth
{
  private $pdo;

  public function __construct(PDO $pdo)
  {
    $this->pdo = $pdo;
  }

  public function getUser()
  {
    $query = "SELECT * FROM author";
    $stmt = $this->pdo->query($query);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public function getUserByEmail($email)
  {
    $stmt = $this->pdo->prepare("SELECT * FROM author WHERE email = :email");
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC); // Returns the user record as an associative array
  }

  public function singup($nickname, $email, $password)
  {
    $stmt = $this->pdo->prepare("INSERT INTO author (nickname, email, password) VALUES (:nickname, :email, :password)");
    $stmt->bindParam(':nickname', $nickname);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $password);

    if ($stmt->execute()) {
      return "Signup successful!";
    } else {
      return "Error during signup!";
    }
  }
 }
