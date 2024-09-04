<?php

declare(strict_types=1);

namespace App\Services;

use Framework\Database;
use Framework\Exceptions\ValidationException;

class UserService {
  public function __construct(private Database $db) {
  }
  public function isEmailTaken(string $email) {
    $emailCount = $this->db->query(
      "SELECT COUNT(*) FROM users WHERE email = :email",
      ['email' => $email]
    )->fetchColum();

    if ($emailCount > 0) {
      throw new ValidationException(['email' => ['Email taken']]);
    }
  }

  public function create(array $formData) {

    $password = password_hash($formData['password'], PASSWORD_BCRYPT, ['cost' => 12]);


    $this->db->query(
      "INSERT INTO users(username,password,email) VALUES(:username,:password,:email)",
      [
        'username' => $formData['username'],
        'password' => $password,
        'email' => $formData['email'],
      ]
    );

    session_regenerate_id();
    $userId = $this->db->id();
    $_SESSION["user"] = $userId;

    $this->db->query(
      "INSERT into payment_methods_assigned_to_users (name,id,user_id)
    SELECT name, null, :userId from payment_methods_default",
      [
        'userId' => $userId
      ]
    );

    $this->db->query(
      "INSERT into expenses_category_assigned_to_users (name,id,user_id)
    SELECT name, null, :userId from expenses_category_default",
      [
        'userId' => $userId
      ]
    );

    $this->db->query(
      "INSERT into incomes_category_assigned_to_users (name,id,user_id)
    SELECT name, null, :userId from incomes_category_default",
      [
        'userId' => $userId
      ]
    );
  }

  public function login(array $formData) {
    $user = $this->db->query(
      "SELECT * FROM users WHERE email = :email",
      ['email' => $formData['email']]
    )->find();

    $passwordsMatch = password_verify($formData['password'], $user['password'] ?? '');

    if (!$user || !$passwordsMatch) {
      throw new ValidationException(['password' => ['Invalid credentials']]);
    }

    session_regenerate_id();
    $_SESSION["user"] = $user['id'];
  }
  public function logout() {
    unset($_SESSION["user"]);
    session_destroy();
    session_regenerate_id();
  }
}
