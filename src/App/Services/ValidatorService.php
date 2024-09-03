<?php

declare(strict_types=1);

namespace App\Services;


use Framework\Rules\{
  RequiredRule,
  EmailRule,
  MinRule,
  InRule,
  UrlRule,
  MatchRule,
  LengthMaxRule,
  NumericRule,
};
use Framework\Validator;

class ValidatorService {
  private array $rules = [];
  private Validator $validator;
  public function __construct() {
    $this->validator = new Validator();

    $this->validator->add('required', new RequiredRule());
    $this->validator->add('email', new EmailRule());
    $this->validator->add('min', new MinRule());
    $this->validator->add('in', new InRule());
    $this->validator->add('match', new MatchRule());
    $this->validator->add('lengthMax', new LengthMaxRule());
    $this->validator->add('numeric', new NumericRule());
  }

  public function validateRegister(array $formData) {
    $this->validator->validate($formData, [
      'username' => ['required'],
      'email' => ['required', 'email'],
      'password' => ['required'],
      'confirmPassword' => ['required', 'match:password']
    ]);
  }
  public function validateLogin(array $formData) {
    $this->validator->validate($formData, [
      'email' => ['required', 'email'],
      'password' => ['required']
    ]);
  }
}
