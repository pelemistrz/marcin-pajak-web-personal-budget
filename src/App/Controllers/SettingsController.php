<?php

declare(strict_types=1);

namespace App\Controllers;

use Framework\TemplateEngine;
use App\Services\ValidatorService;
use App\Services\SettingsService;


class SettingsController {
  public function __construct(
    private TemplateEngine $view,
    private ValidatorService $validatorService,
    private SettingsService $settingsService
  ) {
  }

  public function settingsView() {
    echo $this->view->render(
      template: "/settings.php"
    );
  }
}
