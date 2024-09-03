<?php

declare(strict_types=1);

require __DIR__ . "/../../vendor/autoload.php";

use App\Config\Paths;
use Framework\App;

use function App\Config\registerMiddleware;
use function App\Config\registerRoutes;
use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(Paths::ROOT);
$dotenv->load();

$app = new App(Paths::SOURCE . "App/container-definitions.php");

registerRoutes($app);
registerMiddleware($app);

return $app;
