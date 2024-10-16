<?php include $this->resolve("partials/_header.php"); ?>
<?php include $this->resolve("partials/_navbar.php"); ?>


<div class="container settings">
  <div class="row">
    <div class="col-1"></div>
    <div class="col-10">

      <!-- Change username -->
      <button id="buttonChangeUserName"
        class="btn btn-lg btn-primary mb-3 mt-3">Change user name</button>

      <form id="formUserName" class="hidden mb-3" method="POST" action="/settings/username">

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
        <button class="btn btn-success" type="submit">Confirm</button>
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
        <button class="btn btn-success mb-3" type="submit">Confirm</button>

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
        <button class="btn btn-success mb-3" type="submit">Confirm</button>
      </form>


      <!-- Incomes Category -->

      <button id="editIncomesCategory"
        class="btn btn-lg btn-primary mb-3">Income categories</button>

      <div id="buttonsIncomesCategory" class="hidden pb-3">

        <!-- Add income category -->
        <button id="buttonAddIncomeCategory" type="button" class="btn btn-success mb-1" data-toggle="modal" data-target="#exampleModal">
          Add
        </button>

        <?php include $this->resolve("modals/addIncomeCategory.php"); ?>
        <!-- Edit income category -->
        <button id="buttonEditIncomeCategory" type="button" class="btn btn-success mb-1" data-toggle="modal" data-target="#exampleModal">
          Edit
        </button>

        <?php include $this->resolve("modals/editIncomeCategory.php"); ?>

        <!-- Delete income category -->
        <button id="buttonDeleteIncomeCategory" type="button" class="btn btn-danger mb-3" data-toggle="modal" data-target="#exampleModal">
          Delete
        </button>
        <?php include $this->resolve("modals/deleteIncomeCategory.php"); ?>


      </div>

      <!-- Expenses Category -->
      <button id="editExpensesCategory"
        class="btn btn-lg btn-primary mb-3">Expenses categories</button>
      <div id="buttonsExpensesCategory" class="hidden">

        <!-- Add expense category -->
        <button id="buttonAddExpenseCategory" type="button" class="btn btn-success mb-1" data-toggle="modal" data-target="#exampleModal">
          Add
        </button>
        <?php include $this->resolve("modals/addExpenseCategory.php"); ?>
        <!-- Edit expense category -->

        <button id="buttonEditExpenseCategory" type="button" class="btn btn-success mb-1" data-toggle="modal" data-target="#exampleModal">
          Edit
        </button>





        <table id="expenseCategories" class="backimage my-2 hidden">
          <tr>
            <td>
              <h4 class="text-center">Category Expenses</h4>
            </td>
          </tr>
          <?php foreach ($expensesCategory as $category) : ?>
            <tr class="editExpenseCategory"
              data-category-name="<?php echo e($category['name']); ?>"
              data-category-id="<?php echo e($category['id']); ?>" data-transaction-limit="<?php echo e($category['transaction_limit']); ?>">
              <td>
                <p class="text-start "><?php echo e($category['name']); ?>
                </p>
              </td>
              <td>
                <p>
                  Transaction limit:
                  <?php echo e($category['transaction_limit'] ?
                    $category['transaction_limit'] :  "N/A");
                  ?>

                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pen" viewBox="0 0 16 16">
                    <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001m-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708z" />
                  </svg>
                </p>

                <!-- </a> -->
                </p>

              </td>
            </tr>

          <?php endforeach; ?>

        </table>

        <?php include $this->resolve("modals/editExpenseCategory.php"); ?>


        <!-- Delete expense category -->
        <button id="buttonDeleteExpenseCategory" type="button" class="btn btn-danger mb-3" data-toggle="modal" data-target="#exampleModal">
          Delete
        </button>
        <?php include $this->resolve("modals/deleteExpenseCategory.php"); ?>

      </div>

      <!-- Method Payment -->

      <button id="editMethodsPayment"
        class="btn btn-lg btn-primary mb-3">Payment methods</button>

      <div id="buttonsMethodsPayment" class="hidden">

        <!-- Add payment method -->
        <button id="buttonAddPaymentMethod" type="button" class="btn btn-success mb-1" data-toggle="modal" data-target="#exampleModal">
          Add
        </button>
        <?php include $this->resolve("modals/addPaymentMethod.php"); ?>

        <!-- Edit payment method -->
        <button id="buttonEditPaymentMethod" type="button" class="btn btn-success mb-1" data-toggle="modal" data-target="#exampleModal">
          Edit
        </button>

        <?php include $this->resolve("modals/editPaymentMethod.php"); ?>
        <!-- Delete payment method -->
        <button id="buttonDeletePaymentMethod" type="button" class="btn btn-danger mb-3" data-toggle="modal" data-target="#exampleModal">
          Delete
        </button>
        <?php include $this->resolve("modals/deletePaymentMethod.php"); ?>
      </div>
      <button id="deleteAccount"
        class="btn btn-lg btn-danger mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal">Delete account</button>

      <?php include $this->resolve("modals/deleteAccount.php"); ?>



    </div>
    <div class="col-1"></div>
  </div>
</div>


<script src="https://code.jquery.com/jquery-3.7.1.min.js"
  integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

<script src="./assets/scripts/settingsScript.js"></script>

<?php include $this->resolve("partials/_footer.php"); ?>