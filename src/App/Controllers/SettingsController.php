<?php

declare(strict_types=1);

namespace App\Controllers;

use Framework\TemplateEngine;
use App\Services\ValidatorService;
use App\Services\SettingsService;
use App\Services\UserService;
use App\Services\TransactionService;


class SettingsController {
  public function __construct(
    private TemplateEngine $view,
    private ValidatorService $validatorService,
    private SettingsService $settingsService,
    private UserService $userService,
    private TransactionService $transactionService
  ) {
  }

  public function settingsView() {
    $userExpenseCategory = $this->transactionService->getUserExpenseCategory();
    $userMethodsOfPayment = $this->transactionService->getUserMethodsOfPayment();
    $userIncomeCategory = $this->transactionService->getUserIncomeCategory();


    echo $this->view->render(
      "/settings.php",
      [
        'expensesCategory' => $userExpenseCategory,
        'methodsOfPayment' => $userMethodsOfPayment,
        'incomesCategory' => $userIncomeCategory
      ]
    );
  }

  public function changeUserName() {

    $this->validatorService->validateUserName($_POST);
    $this->settingsService->changeUserName($_POST['username']);
    redirectTo("/settings");
  }

  public function changeEmail() {

    $this->validatorService->validateEmail($_POST);
    $this->userService->isEmailTaken($_POST['email']);
    $this->settingsService->changeEmail($_POST['email']);
    redirectTo("/settings");
  }

  public function changePassword() {
    $this->validatorService->validatePassword($_POST);
    $this->settingsService->changePassword($_POST['password']);
    redirectTo("/settings");
  }
  public function deleteIncomeCategory() {

    $this->validatorService->validateIncomeCategory($_POST);

    $this->settingsService->deleteIncomeCategory((int) $_POST['incomeCategoryId']);

    redirectTo("/settings");
  }
  public function addIncomeCategory() {
    $this->settingsService->addIncomeCategory($_POST['categoryName']);
    redirectTo("/settings");
  }

  public function editIncomeCategory() {
    $this->settingsService->editIncomeCategory($_POST);
    redirectTo("/settings");
  }
  //Expense settings
  public function addExpenseCategory() {
    $this->settingsService->addExpenseCategory($_POST['categoryName']);
    redirectTo("/settings");
  }

  public function deleteExpenseCategory() {

    // $this->validatorService->validateCategory($_POST);
    $this->settingsService->deleteExpenseCategory((int) $_POST['categoryId']);

    redirectTo("/settings");
  }

  public function editExpenseCategory() {
    $this->settingsService->editExpenseCategory($_POST);
    redirectTo("/settings");
  }
  //Payment method
  public function addPaymentMethod() {
    $this->settingsService->addPaymentMethod($_POST['paymentMethodName']);
    redirectTo("/settings");
  }
  public function deletePaymentMethod() {
    $this->settingsService->deletePaymentMethod((int) $_POST['methodOfPaymentId']);

    redirectTo("/settings");
  }

  public function editPaymentMethod() {


    $this->settingsService->editPaymentMethod($_POST);
    redirectTo("/settings");
  }
  //delete account
  public function deleteAccount() {
    $this->settingsService->deleteAccount();

    $this->userService->logout();
    redirectTo('/');
  }
}
