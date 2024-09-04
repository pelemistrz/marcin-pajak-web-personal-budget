<?php

declare(strict_types=1);

namespace App\Services;

use Framework\Database;

class TransactionService {
  public function __construct(private Database $db) {
  }

  public function createExpense(array $formData) {
    $userId = $_SESSION["user"];

    $ID_expense_category_assigned_to_user_id = $this->db->query("SELECT id from expenses_category_assigned_to_users WHERE user_id = :user_id AND name = :expenseName", [
      'user_id' => $userId,
      'expenseName' => $formData['kindOfExpense']
    ])->fetchColum();


    $IDpayment_methods_assigned_to_user_id = $this->db->query("SELECT id from payment_methods_assigned_to_users WHERE user_id = :user_id AND name = :methodOfPayment", [
      'user_id' => $userId,
      'methodOfPayment' => $formData['methodOfPayment']
    ])->fetchColum();


    $this->db->query(
      "INSERT INTO expenses(user_id,expense_category_assigned_to_user_id,payment_methods_assigned_to_user_id,
      amount, date_of_expense, expense_comment) VALUES(
      :user_id,:expense_category_assigned_to_user_id,:payment_methods_assigned_to_user_id,
      :amount, :date_of_expense, :expense_comment)",
      [
        'user_id' => $userId,
        'expense_category_assigned_to_user_id' => $ID_expense_category_assigned_to_user_id,
        'payment_methods_assigned_to_user_id' => $IDpayment_methods_assigned_to_user_id,
        'amount' => $formData['amount'],
        'date_of_expense' => $formData['date'],
        'expense_comment' => $formData['comment']
      ]
    );
  }

  public function createIncome(array $formData) {
    $userId = $_SESSION["user"];

    $IDincome_category_assigned_to_user_id = $this->db->query("SELECT id from incomes_category_assigned_to_users WHERE user_id = :user_id AND name = :incomeCategory", [
      'user_id' => $userId,
      'incomeCategory' => $formData['incomeCategory']
    ])->fetchColum();

    $this->db->query(
      "INSERT INTO incomes(user_id,income_category_assigned_to_user_id,
      amount, date_of_income, income_comment) VALUES(
      :user_id,:income_category_assigned_to_user_id,
      :amount, :date_of_income, :income_comment)",
      [
        'user_id' => $userId,
        'income_category_assigned_to_user_id' => $IDincome_category_assigned_to_user_id,

        'amount' => $formData['amount'],
        'date_of_income' => $formData['date'],
        'income_comment' => $formData['comment']
      ]
    );
  }

  public function getUserExpenseCategory() {
    $userId = $_SESSION["user"];
    $usersCategory = $this->db->query("SELECT name FROM expenses_category_assigned_to_users where user_id = :userId ", [
      'userId' => $userId
    ])->findAll();
    return $usersCategory;
  }
  public function getUserMethodsOfPayment() {
    $userId = $_SESSION["user"];
    $userMethodsOfPayment = $this->db->query("SELECT name FROM payment_methods_assigned_to_users where user_id = :userId ", [
      'userId' => $userId
    ])->findAll();
    return $userMethodsOfPayment;
  }

  public function getUserIncomeCategory() {
    $userId = $_SESSION["user"];
    $usersIncome = $this->db->query("SELECT name FROM incomes_category_assigned_to_users where user_id = :userId ", [
      'userId' => $userId
    ])->findAll();
    return $usersIncome;
  }
}
