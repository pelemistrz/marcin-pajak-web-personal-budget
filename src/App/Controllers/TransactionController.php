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


    echo $this->view->render("/expense.php", [
      'expensesCategory' => $userExpenseCategory,
      'methodsOfPayment' => $userMethodsOfPayment
    ]);
  }
  public function addExpense() {

    $this->validatorService->validateExpense($_POST);
    $this->transactionService->createExpense($_POST);
    redirectTo('/main');
  }
  //Incomes
  public function incomeView() {
    $userIncomeCategory = $this->transactionService->getUserIncomeCategory();

    echo $this->view->render("/income.php", [
      'incomesCategory' => $userIncomeCategory
    ]);
  }

  public function addIncome() {

    $this->validatorService->validateIncome($_POST);
    $this->transactionService->createIncome($_POST);
    redirectTo('/main');
  }
}
