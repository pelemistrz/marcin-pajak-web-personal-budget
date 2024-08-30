<?php

declare(strict_types=1);

namespace App\Controllers;

use Framework\TemplateEngine;


class MainController {
  public function __construct(private TemplateEngine $view) {
  }

  public function main() {
    echo $this->view->render(
      "/main.php"
    );
  }
}
