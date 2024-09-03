<?php

declare(strict_types=1);

namespace App\Middleware;

use Framework\Contracts\MiddlewareInterface;
use Framework\Exceptions\ValidationException;

class ValidationExceptionMiddleware implements MiddlewareInterface {

  public function process(callable $next) {
    $oldFormData = $_POST;
    $exludedFields = ['password', 'confirmPassword'];

    $formattedFormData = array_diff_key(
      $oldFormData,
      array_flip($exludedFields)
    );

    try {
      $next();
    } catch (ValidationException $e) {
      $_SESSION["errors"] = $e->errors;
      $_SESSION["oldFormData"] = $formattedFormData;

      $referer = $_SERVER["HTTP_REFERER"];
      redirectTo($referer);
    }
  }
}
