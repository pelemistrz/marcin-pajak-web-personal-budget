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
  public function editIncomeCategory(array $formData) {
    $this->db->query(
      "UPDATE incomes_category_assigned_to_users set name = :newCategoryName where user_id = :userId and id = :categoryId",
      [
        'newCategoryName' => $formData['newCategoryName'],
        'userId' => $_SESSION["user"],
        'categoryId' => $formData['incomeCategoryId']
      ]
    );
  }
  //Expense settings
  public function addExpenseCategory(string $categoryName) {
    $this->db->query(
      "INSERT INTO expenses_category_assigned_to_users(user_id,name) Values (:userId, :categoryName)",
      [
        'categoryName' => $categoryName,
        'userId' => $_SESSION["user"]
      ]
    );
  }

  public function deleteExpenseCategory(int $categoryId) {
    $this->db->query(
      "DELETE FROM expenses_category_assigned_to_users  WHERE id = :id AND user_id = :userId",
      [
        'id' => $categoryId,
        'userId' => $_SESSION["user"]
      ]
    );
  }

  public function editExpenseCategory(array $formData) {



    $this->db->query(
      "UPDATE expenses_category_assigned_to_users set name = :newCategoryName,transaction_limit = :categoryTransactionLimit where user_id = :userId and id = :categoryId",
      [
        'newCategoryName' => $formData['categoryName'],
        'userId' => $_SESSION["user"],
        'categoryId' => $formData['categoryId'],
        'categoryTransactionLimit' => $formData['categoryTransactionLimit']
      ]
    );
  }
  //payment method
  public function addPaymentMethod($paymentMethodName) {
    $this->db->query(
      "INSERT INTO payment_methods_assigned_to_users(user_id,name) Values (:userId, :paymentMethodName)",
      [
        'paymentMethodName' => $paymentMethodName,
        'userId' => $_SESSION["user"]
      ]
    );
  }
  public function deletePaymentMethod(int $methodOfPaymentId) {
    $this->db->query(
      "UPDATE expenses set payment_methods_assigned_to_user_id = NULL WHERE payment_methods_assigned_to_user_id = :id AND user_id = :userId",
      [
        'id' => $methodOfPaymentId,
        'userId' => $_SESSION["user"]
      ]
    );
    $this->db->query(
      "DELETE FROM payment_methods_assigned_to_users  WHERE id = :id AND user_id = :userId",
      [
        'id' => $methodOfPaymentId,
        'userId' => $_SESSION["user"]
      ]
    );
  }

  public function editPaymentMethod(array $formData) {
    $this->db->query(
      "UPDATE payment_methods_assigned_to_users set name = :newPaymentMethodName where user_id = :userId and id = :paymentMethodId",
      [
        'newPaymentMethodName' => $formData['newPaymentMethodName'],
        'userId' => $_SESSION["user"],
        'paymentMethodId' => $formData['paymentMethodId']
      ]
    );
  }
  public function deleteAccount() {
    $this->db->query(
      "DELETE FROM users WHERE id = :userId",
      [

        'userId' => $_SESSION["user"]
      ]
    );
  }
}
