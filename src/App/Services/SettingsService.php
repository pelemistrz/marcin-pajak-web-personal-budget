<?php

declare(strict_types=1);

namespace App\Services;

use Framework\Database;

class SettingsService {
  public function __construct(private Database $db) {
  }

  public function changeUserName(string $userName) {
    $this->db->query(
      "UPDATE users set username = :userName where id = :userId",
      [
        'userName' => $userName,
        'userId' => $_SESSION["user"]
      ]
    );
  }

  public function changeEmail(string $email) {
    $this->db->query(
      "UPDATE users set email = :email where id = :userId",
      [
        'email' => $email,
        'userId' => $_SESSION["user"]
      ]
    );
  }

  public function changePassword(string $password) {
    $hashedPassword = password_hash($password, PASSWORD_BCRYPT, ['cost' => 12]);

    $this->db->query(
      "UPDATE users set password = :password where id = :userId",
      [
        'password' => $hashedPassword,
        'userId' => $_SESSION["user"]
      ]
    );
  }

  public function deleteIncomeCategory(int $categoryId) {
    $this->db->query(
      "DELETE FROM incomes_category_assigned_to_users  WHERE id = :id AND user_id = :userId",
      [
        'id' => $categoryId,
        'userId' => $_SESSION["user"]
      ]
    );
  }

  public function addIncomeCategory(string $categoryName) {
    $this->db->query(
      "INSERT INTO incomes_category_assigned_to_users(user_id,name) Values (:userId, :categoryName)",
      [
        'categoryName' => $categoryName,
        'userId' => $_SESSION["user"]
      ]
    );
  }
}
