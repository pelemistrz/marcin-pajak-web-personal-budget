<?php

declare(strict_types=1);

namespace App\Controllers;

use Framework\TemplateEngine;
use App\Services\ValidatorService;
use App\Services\SettingsService;
use App\Services\UserService;


class SettingsController {
  public function __construct(
    private TemplateEngine $view,
    private ValidatorService $validatorService,
    private SettingsService $settingsService,
    private UserService $userService

  ) {
  }

  public function settingsView() {
    echo $this->view->render(
      template: "/settings.php"
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
}
