<?php

declare(strict_types=1);

namespace App\Config;

use Framework\App;
use App\Controllers\{
  HomeController,
  AuthController,
  BalanceController,
  TransactionController,
  ErrorController,
  SettingsController
};
use App\Middleware\{AuthRequiredMiddleware, GuestOnlyMiddleware};
use App\Controllers\MainController;

function registerRoutes(App $app) {
  $app->get('/', [HomeController::class, 'home'])->add(GuestOnlyMiddleware::class);
  $app->get('/main', [MainController::class, 'main'])->add(AuthRequiredMiddleware::class);
  $app->get('/register', [AuthController::class, 'registerView'])->add(GuestOnlyMiddleware::class);
  $app->post('/register', [AuthController::class, 'register'])->add(GuestOnlyMiddleware::class);

  $app->get('/login', [AuthController::class, 'loginView'])->add(GuestOnlyMiddleware::class);
  $app->post('/login', [AuthController::class, 'login'])->add(GuestOnlyMiddleware::class);


  $app->get('/logout', [AuthController::class, 'logout'])->add(AuthRequiredMiddleware::class);

  // Expense
  $app->get('/expense', [TransactionController::class, 'expenseView'])->add(AuthRequiredMiddleware::class);
  $app->post('/expense', [TransactionController::class, 'addExpense'])->add(AuthRequiredMiddleware::class);
  $app->get('/expense/{expense}', [TransactionController::class, 'editViewExpense'])->add(AuthRequiredMiddleware::class);
  $app->post('/expense/{expense}', [TransactionController::class, 'editExpense'])->add(AuthRequiredMiddleware::class);
  $app->delete('/expense/{expense}', [TransactionController::class, 'deleteExpense'])->add(AuthRequiredMiddleware::class);

  //Income
  $app->get('/income', [TransactionController::class, 'incomeView'])->add(AuthRequiredMiddleware::class);
  $app->post('/income', [TransactionController::class, 'addIncome'])->add(AuthRequiredMiddleware::class);
  $app->get('/income/{income}', [TransactionController::class, 'editViewIncome'])->add(AuthRequiredMiddleware::class);
  $app->post('/income/{income}', [TransactionController::class, 'editIncome'])->add(AuthRequiredMiddleware::class);
  $app->delete('/income/{income}', [TransactionController::class, 'deleteIncome'])->add(AuthRequiredMiddleware::class);

  // Balance
  $app->get('/balance', [BalanceController::class, 'balanceView'])->add(AuthRequiredMiddleware::class);
  $app->setErrorHandler([ErrorController::class, 'notFound']);

  //Setting
  $app->get('/settings', [SettingsController::class, 'settingsView'])->add(AuthRequiredMiddleware::class);
  $app->post('/settings/username', [SettingsController::class, 'changeUserName'])->add(AuthRequiredMiddleware::class);
  $app->post('/settings/email', [SettingsController::class, 'changeEmail'])->add(AuthRequiredMiddleware::class);
  $app->post('/settings/password', [SettingsController::class, 'changePassword'])->add(AuthRequiredMiddleware::class);

  //setting incomes
  $app->post('/settings/addIncomeCategory', [SettingsController::class, 'addIncomeCategory'])->add(AuthRequiredMiddleware::class);
  $app->delete('/settings/deleteincomecategory', [SettingsController::class, 'deleteIncomeCategory'])->add(AuthRequiredMiddleware::class);
  $app->post('/settings/editincomecategory', [SettingsController::class, 'editIncomeCategory'])->add(AuthRequiredMiddleware::class);

  //setting expenses
  $app->post('settings/addexpensecategory', [SettingsController::class, 'addExpenseCategory'])->add(AuthRequiredMiddleware::class);
  $app->delete('/settings/deleteexpensecategory', [SettingsController::class, 'deleteExpenseCategory'])->add(AuthRequiredMiddleware::class);
  $app->post('/settings/editexpensecategory', [SettingsController::class, 'editExpenseCategory'])->add(AuthRequiredMiddleware::class);

  //setting method payment
  $app->post('settings/addpaymentmethod', [SettingsController::class, 'addPaymentMethod'])->add(AuthRequiredMiddleware::class);
  $app->delete('/settings/deletepaymentmethod', [SettingsController::class, 'deletePaymentMethod'])->add(AuthRequiredMiddleware::class);
  $app->post('settings/editpaymentmethod', [SettingsController::class, 'editPaymentMethod'])->add(AuthRequiredMiddleware::class);
}
