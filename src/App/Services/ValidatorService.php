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
  DateFormatRule
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
    $this->validator->add('dateFormat', new DateFormatRule());
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

  public function validateExpense(array $formData) {
    $this->validator->validate($formData, [
      'amount'  => ['required', 'numeric'],
      'date' => ['required', 'dateFormat:Y-m-d'],
      'comment' => ['lengthMax:100'],
      'categoryOfExpense' => ['required']
    ]);
  }

  public function validateIncome(array $formData) {
    $this->validator->validate($formData, [
      'amount'  => ['required', 'numeric'],
      'date' => ['required', 'dateFormat:Y-m-d'],
      'comment' => ['lengthMax:100']
    ]);
  }

  public function validateUserName(array $formData) {
    $this->validator->validate($formData, [
      'username' => ['required']
    ]);
  }

  public function validateEmail(array $formData) {
    $this->validator->validate($formData, [
      'email' => ['required', 'email']
    ]);
  }
  public function validatePassword(array $formData) {
    $this->validator->validate($formData, [
      'password' => ['required'],
      'confirmPassword' => ['required', 'match:password']
    ]);
  }
}
