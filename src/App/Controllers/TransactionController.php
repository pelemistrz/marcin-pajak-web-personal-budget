<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Services\TransactionService;
use App\Services\ValidatorService;
use Framework\TemplateEngine;

class TransactionController {
  public function __construct(
    private TemplateEngine $view,
    private ValidatorService $validatorService,
    private TransactionService $transactionService
  ) {
  }

  //Expenses
  public function expenseView() {
    $userExpenseCategory = $this->transactionService->getUserExpenseCategory();
    $userMethodsOfPayment = $this->transactionService->getUserMethodsOfPayment();


    echo $this->view->render("/transactions/expense.php", [
      'expensesCategory' => $userExpenseCategory,
      'methodsOfPayment' => $userMethodsOfPayment
    ]);
  }
  public function addExpense() {
    $this->validatorService->validateExpense($_POST);
    $this->transactionService->createExpense($_POST);
    redirectTo('/main');
  }

  public function editViewExpense(array $params) {
    $expense = $this->transactionService->getUserExpense($params['expense']);

    $userExpenseCategory = $this->transactionService->getUserExpenseCategory();

    $userMethodsOfPayment = $this->transactionService->getUserMethodsOfPayment();

    if (!$expense) {
      redirectTo('/balance');
    }

    echo $this->view->render("/transactions/editExpense.php", [
      'expensesCategory' => $userExpenseCategory,
      'expense' => $expense,
      'methodsOfPayment' => $userMethodsOfPayment

    ]);
  }

  public function editExpense($params) {
    $expense = $this->transactionService->getUserExpense($params['expense']);

    if (!$expense) {
      redirectTo('/balance');
    }

    $this->validatorService->validateExpense($_POST);
    $this->transactionService->editExpense($_POST, $expense['id']);
    redirectTo('/balance');
  }

  public function deleteExpense($params) {
    $this->transactionService->deleteExpense((int) $params['expense']);
    redirectTo('/balance');
  }


  //Incomes
  public function incomeView() {
    $userIncomeCategory = $this->transactionService->getUserIncomeCategory();
    echo $this->view->render("/transactions/income.php", [
      'incomesCategory' => $userIncomeCategory
    ]);
  }

  public function addIncome() {
    $this->validatorService->validateIncome($_POST);
    $this->transactionService->createIncome($_POST);
    redirectTo('/main');
  }

  public function editViewIncome(array $params) {
    $income = $this->transactionService->getUserIncome($params['income']);

    $userIncomeCategory = $this->transactionService->getUserIncomeCategory();

    if (!$income) {
      redirectTo('/balance');
    }

    echo $this->view->render("/transactions/editIncome.php", [
      'incomesCategory' => $userIncomeCategory,
      'income' => $income
    ]);
  }


  public function editIncome(array $params) {
    $income = $this->transactionService->getUserIncome($params['income']);

    if (!$income) {
      redirectTo('/balance');
    }

    $this->validatorService->validateIncome($_POST);
    $this->transactionService->editIncome($_POST, $income['id']);
    redirectTo('/balance');
  }

  public function deleteIncome(array $params) {
    $this->transactionService->deleteIncome((int) $params['income']);
    redirectTo('/balance');
  }
}
