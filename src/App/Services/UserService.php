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

    $this->db->query(
      "INSERT INTO users(username,password,email) VALUES(:email,:password,:email)",
      [
        'email' => $formData['email'],
        'password' => $formData['password'],
        'username' => 'username'
      ]
    );

    $userId =  $this->db->query(
      "SELECT id from users where email = :email",
      [
        'email' => $formData['email']
      ]
    )->fetchColum();


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
}
