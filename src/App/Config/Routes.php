<?php

declare(strict_types=1);

namespace App\Config;

use Framework\App;
use App\Controllers\HomeController;
use App\Controllers\MainPageController;

function registerRoutes(App $app) {
  $app->get('/', [HomeController::class, 'home']);
  $app->get('/main', [MainPageController::class, 'mainPage']);
}
