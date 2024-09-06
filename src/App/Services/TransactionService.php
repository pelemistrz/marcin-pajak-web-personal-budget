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
      'expenseName' => $formData['categoryOfExpense']
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

  public function getUserExpenses(string $startDate, string $endDate = "") {
    if ($endDate === "") {
      $endDate = date("Y-m-d");
    }
    $userExpenses = $this->db->query(
      "SELECT e.id, c.name,e.amount,e.date_of_expense,e.expense_comment,p.name as method FROM expenses e, expenses_category_assigned_to_users c, payment_methods_assigned_to_users p WHERE e.user_id = :userId and e.expense_category_assigned_to_user_id = c.id and e.payment_methods_assigned_to_user_id = p.id AND date_of_expense > :startDate AND date_of_expense < :endDate ",
      [
        'userId' => $_SESSION["user"],
        'startDate' => $startDate,
        'endDate' => $endDate

      ]
    )->findAll();
    return $userExpenses;
  }
  public function getUserIncomes(string $startDate, string $endDate = "") {
    if ($endDate === "") {
      $endDate = date("Y-m-d");
    }
    $userIncomes = $this->db->query(
      "SELECT i.id, c.name,i.amount,i.date_of_income,i.income_comment FROM incomes i, incomes_category_assigned_to_users c WHERE i.user_id = :userId and i.income_category_assigned_to_user_id = c.id AND date_of_income > :startDate AND date_of_income < :endDate",
      [
        'userId' => $_SESSION["user"],
        'startDate' => $startDate,
        'endDate' => $endDate

      ]
    )->findAll();
    return $userIncomes;
  }

  public function getUserSumOfExpenses(string $startDate, string $endDate = "") {
    if ($endDate === "") {
      $endDate = date("Y-m-d");
    }
    $userSumOfExpenses = $this->db->query(
      "SELECT SUM(e.amount) as expensesSum FROM expenses e, expenses_category_assigned_to_users c, payment_methods_assigned_to_users p WHERE e.user_id = :userId and e.expense_category_assigned_to_user_id = c.id and e.payment_methods_assigned_to_user_id = p.id AND date_of_expense > :startDate AND date_of_expense < :endDate ",
      [
        'userId' => $_SESSION["user"],
        'startDate' => $startDate,
        'endDate' => $endDate

      ]
    )->find();
    return  $userSumOfExpenses;
  }
  public function getUserSumOfIncomes(string $startDate, string $endDate = "") {
    if ($endDate === "") {
      $endDate = date("Y-m-d");
    }
    $userSumOfIncomes = $this->db->query(
      "SELECT SUM(i.amount) as incomesSum FROM incomes i, incomes_category_assigned_to_users c WHERE i.user_id = :userId and i.income_category_assigned_to_user_id = c.id AND date_of_income > :startDate AND date_of_income < :endDate",
      [
        'userId' => $_SESSION["user"],
        'startDate' => $startDate,
        'endDate' => $endDate

      ]
    )->find();
    return  $userSumOfIncomes;
  }

  public function getUserIncome(string $id) {
    return $this->db->query(
      "SELECT i.id, i.amount, i.income_comment, DATE_FORMAT(date_of_income,'%Y-%m-%d') as formattedDate, c.name FROM incomes i,incomes_category_assigned_to_users c where i.id = :id AND i.user_id = :userId AND i.income_category_assigned_to_user_id = c.id",
      [
        'id' => $id,
        'userId' => $_SESSION["user"]
      ]
    )->find();
  }

  public function getUserExpense(string $id) {
    return $this->db->query(
      "SELECT e.id, c.name as category,e.amount,e.date_of_expense,e.expense_comment,p.name as paymentMethod FROM expenses e, expenses_category_assigned_to_users c, payment_methods_assigned_to_users p WHERE e.user_id = :userId and e.expense_category_assigned_to_user_id = c.id and e.payment_methods_assigned_to_user_id = p.id and e.id=:id",
      [
        'id' => $id,
        'userId' => $_SESSION["user"]
      ]
    )->find();
  }

  public function editIncome(array $formData, int $id) {

    $IDincome_category_assigned_to_user_id = $this->db->query("SELECT id from incomes_category_assigned_to_users WHERE user_id = :user_id AND name = :incomeCategory", [
      'user_id' => $_SESSION["user"],
      'incomeCategory' => $formData['incomeCategory']
    ])->fetchColum();

    $this->db->query(
      "UPDATE incomes SET income_category_assigned_to_user_id =:income_category_assigned_to_user_id,
      amount = :amount, date_of_income = :date_of_income, income_comment =:income_comment where id = :id and user_id = :userId",
      [
        'income_category_assigned_to_user_id' => $IDincome_category_assigned_to_user_id,
        'amount' => $formData['amount'],
        'date_of_income' => $formData['date'],
        'income_comment' => $formData['comment'],
        'id' => $id,
        'userId' => $_SESSION["user"]
      ]
    );
  }

  public function editExpense(array $formData, int $id) {
    $userId = $_SESSION["user"];

    $ID_expense_category_assigned_to_user_id = $this->db->query("SELECT id from expenses_category_assigned_to_users WHERE user_id = :user_id AND name = :expenseName", [
      'user_id' => $userId,
      'expenseName' => $formData['categoryOfExpense']
    ])->fetchColum();


    $IDpayment_methods_assigned_to_user_id = $this->db->query("SELECT id from payment_methods_assigned_to_users WHERE user_id = :user_id AND name = :methodOfPayment", [
      'user_id' => $userId,
      'methodOfPayment' => $formData['methodOfPayment']
    ])->fetchColum();


    $this->db->query(
      "UPDATE expenses SET expense_category_assigned_to_user_id =:expense_category_assigned_to_user_id,payment_methods_assigned_to_user_id = :payment_methods_assigned_to_user_id,
      amount = :amount, date_of_expense = :date_of_expense, expense_comment =:expense_comment where id = :id and user_id = :userId",
      [

        'expense_category_assigned_to_user_id' => $ID_expense_category_assigned_to_user_id,
        'payment_methods_assigned_to_user_id' => $IDpayment_methods_assigned_to_user_id,
        'amount' => $formData['amount'],
        'date_of_expense' => $formData['date'],
        'expense_comment' => $formData['comment'],
        'id' => $id,
        'userId' => $_SESSION["user"]
      ]
    );
  }

  public function deleteExpense(int $id) {
    $this->db->query("DELETE from expenses WHERE id = :id and user_id = :userId", [
      'id' => $id,
      'userId' => $_SESSION["user"]
    ]);
  }

  public function deleteIncome(int $id) {
    $this->db->query("DELETE from incomes WHERE id = :id and user_id = :userId", [
      'id' => $id,
      'userId' => $_SESSION["user"]
    ]);
  }

  public function getTableExpenses($startDate, $endDate) {
    if ($endDate === "") {
      $endDate = date("Y-m-d");
    }
    return $this->db->query(
      "SELECT c.name,SUM(e.amount) as amount FROM expenses e, expenses_category_assigned_to_users c WHERE e.user_id = :userId and e.expense_category_assigned_to_user_id = c.id AND date_of_expense > :startDate AND date_of_expense < :endDate GROUP BY(expense_category_assigned_to_user_id)",
      [
        'userId' => $_SESSION["user"],
        'startDate' => $startDate,
        'endDate' => $endDate
      ]
    )->findAll();
  }
}
