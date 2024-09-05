<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Services\TransactionService;
use Framework\TemplateEngine;


class BalanceController {
  public function __construct(
    private TemplateEngine $view,
    private TransactionService $transactionService
  ) {
  }

  public function balanceView() {
    $startDate = $_GET['s'] ?? date('Y-m') . '-01';
    $endDate = $_GET['e'] ?? '';


    $expensesSum = $this->transactionService->getUserSumOfExpenses($startDate, $endDate);
    $incomesSum = $this->transactionService->getUserSumOfIncomes($startDate, $endDate);

    $balance = $incomesSum['incomesSum'] -
      $expensesSum['expensesSum'];

    $userExpenses = $this->transactionService->getUserExpenses($startDate, $endDate);
    $userIncomes = $this->transactionService->getUserIncomes($startDate, $endDate);

    echo $this->view->render(
      "/balance.php",
      [
        'userExpenses' => $userExpenses,
        'userIncomes' => $userIncomes,
        'expensesSum' => $expensesSum,
        'incomesSum' => $incomesSum,
        'balance' => $balance
      ]
    );
  }
}
