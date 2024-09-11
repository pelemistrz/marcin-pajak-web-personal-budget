<?php include $this->resolve("partials/_header.php"); ?>
<?php include $this->resolve("partials/_navbar.php"); ?>


<!-- <div class="container settings">
  <div class="row">
    <div class="col-1"></div>
    <div class="col-10"> -->

<!-- Change username -->
<button id="buttonChangeUserName"
  class="btn btn-lg btn-primary mb-3">Change user name</button>

<form id="formUserName" class="hidden" method="POST" action="/settings/username">

  <?php include $this->resolve('partials/_csrf.php'); ?>

  <div class="mb-3 pb-2 input-group">
    <i class="fa fa-user"></i>
    <input type="text" class="form-control" id="inputName" placeholder="User name" name="username">
  </div>

  <?php if (array_key_exists('username', $errors)) : ?>
    <div class="bg-gray-100 p-2 text-red-500">
      <?php echo e($errors['username'][0]); ?>
    </div>
  <?php endif; ?>
  <button class="btn btn-primary" type="submit">Confirm</button>
</form>

<!-- Change Email -->

<button id="buttonChangeEmail"
  class="btn btn-lg btn-primary mb-3">Change email</button>

<form id="formEmail" class="hidden" action="/settings/email" method="POST">

  <?php include $this->resolve('partials/_csrf.php'); ?>

  <div class="mb-3 pb-2 input-group">
    <i class="fa fa-solid fa-envelope"></i>
    <input value="<?php echo e($oldFormData['email'] ?? ''); ?>" type=" email" class="form-control" id="inputEmail" placeholder="Email" name="email" required>
  </div>
  <?php if (array_key_exists('email', $errors)) : ?>
    <div class="bg-gray-100 p-2 text-red-500">
      <?php echo e($errors['email'][0]); ?>
    </div>
  <?php endif; ?>
  <button class="btn btn-primary" type="submit">Confirm</button>

</form>

<!-- Change Password -->
<button id="buttonChangePassword"
  class="btn btn-lg btn-primary mb-3">Change password</button>
<form id="formPassword" class="hidden" action="/settings/password" method="POST">

  <?php include $this->resolve('partials/_csrf.php'); ?>


  <div class="mb-3 pb-2 input-group">
    <i class="fa fa-lock"></i>
    <input type="password" class="form-control" id="inputPassword" placeholder="Password" name="password" required>
  </div>
  <?php if (array_key_exists('password', $errors)) : ?>
    <div class="bg-gray-100 p-2 text-red-500">
      <?php echo e($errors['password'][0]); ?>
    </div>
  <?php endif; ?>
  <!-- Confirm password -->

  <div class="mb-3 pb-2 input-group">
    <i class="fa fa-lock"></i>
    <input type="password" class="form-control" id="repeatPassword" placeholder="Repeat password" name="confirmPassword" required>
  </div>
  <?php if (array_key_exists('confirmPassword', $errors)) : ?>
    <div class="bg-gray-100 mt-2 p-2 text-red-500">
      <?php echo e($errors['confirmPassword'][0]); ?>
    </div>
  <?php endif; ?>
  <button class="btn btn-primary" type="submit">Confirm</button>
</form>


<!-- Incomes Category -->

<button id="editIncomesCategory"
  class="btn btn-lg btn-primary mb-3">Income categories</button>

<div id="buttonsIncomesCategory" class="hidden">

  <!-- Add income category -->
  <button id="buttonAddIncomeCategory" type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
    Add
  </button>

  <?php include $this->resolve("modals/addIncomeCategory.php"); ?>

  <!-- Delete income category -->
  <button id="buttonDeleteIncomeCategory" type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
    Delete
  </button>
  <?php include $this->resolve("modals/deleteIncomeCategory.php"); ?>

  <!-- Edit income category -->
  <button id="buttonEditIncomeCategory" type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
    Edit
  </button>

  <?php include $this->resolve("modals/editIncomeCategory.php"); ?>
</div>

<!-- Expenses Category -->

<button id="editExpensesCategory"
  class="btn btn-lg btn-primary mb-3">Expenses categories</button>

<div id="buttonsExpensesCategory" class="hidden">

  <!-- Add expense category -->
  <button id="buttonAddExpenseCategory" type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
    Add
  </button>
  <?php include $this->resolve("modals/addExpenseCategory.php"); ?>

  <!-- Delete expense category -->
  <button id="buttonDeleteExpenseCategory" type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
    Delete
  </button>
  <?php include $this->resolve("modals/deleteExpenseCategory.php"); ?>

  <!-- Edit expense category -->
  <button id="buttonEditExpenseCategory" type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
    Edit
  </button>

  <?php include $this->resolve("modals/editExpenseCategory.php"); ?>
</div>

<!-- Method Payment -->

<button id="editMethodsPayment"
  class="btn btn-lg btn-primary mb-3">Payment methods</button>

<div id="buttonsMethodsPayment">

  <!-- Add payment method -->
  <button id="buttonAddPaymentMethod" type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
    Add
  </button>
  <?php include $this->resolve("modals/addPaymentMethod.php"); ?>

  <!-- Delete expense category -->
  <button id="buttonDeletePaymentMethod" type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
    Delete
  </button>
  <?php include $this->resolve("modals/deletePaymentMethod.php"); ?>

  <!-- Edit expense category -->
  <button id="buttonEditPaymentMethod" type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
    Edit
  </button>

  <?php include $this->resolve("modals/editPaymentMethod.php"); ?>
</div>




<!-- 

  </div>

  <div class="col-1"></div>

</div>



</div> -->



<script src="https://code.jquery.com/jquery-3.7.1.min.js"
  integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>


<script src="./assets/scripts/settingsScript.js"></script>



<?php include $this->resolve("partials/_footer.php"); ?>