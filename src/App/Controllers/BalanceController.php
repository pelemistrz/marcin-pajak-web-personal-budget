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
    $option = $_GET['o'] ?? '';

    if ($option === 'currentMonth' || $option === '') {
      $startDate = date('Y-m') . '-01';
      $endDate = '';
    } else if ($option === 'previousMonth') {
      $startDate = date('Y-m-d', strtotime('first day of previous month'));
      $endDate = date('Y-m-d', strtotime('last day of previous month'));
    } else if ($option === 'currentYear') {
      $startDate = date('Y') . '-01-01';
      $endDate = '';
    } else if ($option === 'dateRange') {

      $startDate = $_GET['s'] ?? date('Y-m') . '-01';
      $endDate = $_GET['e'] ?? '';
    }


    $expensesSum = $this->transactionService->getUserSumOfExpenses($startDate, $endDate);
    $incomesSum = $this->transactionService->getUserSumOfIncomes($startDate, $endDate);

    $balance = $incomesSum['incomesSum'] -
      $expensesSum['expensesSum'];

    $userExpenses = $this->transactionService->getUserExpenses($startDate, $endDate);
    $userIncomes = $this->transactionService->getUserIncomes($startDate, $endDate);




    $tableExpenses = $this->transactionService->getTableExpenses($startDate, $endDate);

    echo $this->view->render(
      "/balance.php",
      [
        'userExpenses' => $userExpenses,
        'userIncomes' => $userIncomes,
        'expensesSum' => $expensesSum,
        'incomesSum' => $incomesSum,
        'balance' => $balance,
        'tableExpenses' =>  $tableExpenses,
        'period' => $option
      ]
    );
  }
}
