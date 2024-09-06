<?php include $this->resolve("partials/_header.php"); ?>

<?php include $this->resolve("partials/_navbar.php"); ?>


<div class="form">
  <h3>Insert data for expense</h3>

  <form method="POST">
    <?php include $this->resolve('partials/_csrf.php'); ?>
    <!-- Amount -->
    <div class="mb-3 pb-2 input-group">
      <i class="fa fa-solid fa-dollar-sign"></i>
      <input value="<?php echo e($expense['amount'] ?? ''); ?>" type="number" class="form-control" id="inputAmountExpense" placeholder="Amount" name="amount">
    </div>
    <?php if (array_key_exists('amount', $errors)) : ?>
      <div class="bg-gray-100 mt-2 p-2 text-red-500">
        <?php echo e($errors['amount'][0]); ?>
      </div>
    <?php endif; ?>

    <!-- Date -->

    <div class="mb-3 pb-2 input-group">
      <input value="<?php echo e($expense['date_of_expense'] ?? ''); ?>" id="dateExpense" class="form-control" type="date" value="" placeholder="Date" name="date" />
    </div>
    <?php if (array_key_exists('date', $errors)) : ?>
      <div class="bg-gray-100 mt-2 p-2 text-red-500">
        <?php echo e($errors['date'][0]); ?>
      </div>
    <?php endif; ?>

    <!-- Method of payment -->
    <div class="mb-3 pb-2 input-group">
      <i class="fa fa-solid fa-money-bill"></i>
      <select id="methodOfPayment" name="methodOfPayment">
        <?php foreach ($methodsOfPayment as $methodOfPayment) : ?>
          <option value="<?php echo e($methodOfPayment['name']); ?>" <?php if ($methodOfPayment['name'] === $expense['paymentMethod']) {
                                                                        echo 'selected';
                                                                      } ?>>
            <?php echo e($methodOfPayment['name']); ?>
          </option>
        <?php endforeach; ?>

      </select>
    </div>
    <!-- Expense category -->
    <div class="mb-3 pb-2 input-group">
      <i class="fa fa-solid fa-cart-shopping"></i>
      <select id="categoryOfExpense" name="categoryOfExpense">

        <?php foreach ($expensesCategory as $expenseCategory) : ?>
          <option value="<?php echo e($expenseCategory['name']); ?>" <?php if ($expenseCategory['name'] === $expense['category']) echo 'selected'; ?>>
            <?php echo e($expenseCategory['name']); ?>
          </option>
        <?php endforeach; ?>

      </select>
    </div>
    <div class="mb-3 pb-2 input-group">
      <i class="fa fa-solid fa-comment"></i>
      <input value="<?php echo e($expense['expense_comment'] ?? ''); ?>" type="text" class="form-control" id="inputDateExpense" placeholder="Comment" name="comment">
    </div>
    <?php if (array_key_exists('comment', $errors)) : ?>
      <div class="bg-gray-100 mt-2 p-2 text-red-500">
        <?php echo e($errors['comment'][0]); ?>
      </div>
    <?php endif; ?>
    <div class="buttons">
      <button class="btn btn-danger">Cancel</button>
      <button type="submit" class="btn btn-success">Add</button>
    </div>
  </form>
</div>



<?php include $this->resolve("partials/_footer.php"); ?>