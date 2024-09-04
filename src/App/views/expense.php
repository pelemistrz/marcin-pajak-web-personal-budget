<?php include $this->resolve("partials/_header.php"); ?>

<?php include $this->resolve("partials/_navbar.php"); ?>



<div class="form">
  <h3>Insert data for expense</h3>

  <form action="/expense" method="POST">
    <?php include $this->resolve('partials/_csrf.php'); ?>
    <!-- Amount -->
    <div class="mb-3 pb-2 input-group">
      <i class="fa fa-solid fa-dollar-sign"></i>
      <input value="<?php echo e($oldFormData['amount'] ?? ''); ?>" type="number" class="form-control" id="inputAmountExpense" placeholder="Amount" name="amount">
    </div>
    <?php if (array_key_exists('amount', $errors)) : ?>
      <div class="bg-gray-100 mt-2 p-2 text-red-500">
        <?php echo e($errors['amount'][0]); ?>
      </div>
    <?php endif; ?>

    <!-- Date -->

    <div class="mb-3 pb-2 input-group">
      <input value="<?php echo e($oldFormData['date'] ?? ''); ?>" id="dateExpense" class="form-control" type="date" value="" placeholder="Date" name="date" />
    </div>
    <?php if (array_key_exists('date', $errors)) : ?>
      <div class="bg-gray-100 mt-2 p-2 text-red-500">
        <?php echo e($errors['date'][0]); ?>
      </div>
    <?php endif; ?>

    <!-- Method of payment -->
    <div class="mb-3 pb-2 input-group">
      <i class="fa fa-solid fa-money-bill"></i>
      <select id="howPaid" name="methodOfPayment">
        <option value="Cash" selected>Cash</option>
        <option value="Credit Card">Credit Card</option>
        <option value="Debit Card">Debit Card</option>
        <option value="Wire transfer">Wire transfer</option>
      </select>
    </div>
    <!-- Expense category -->
    <div class="mb-3 pb-2 input-group">
      <i class="fa fa-solid fa-cart-shopping"></i>
      <select id="kindOfExpense" name="kindOfExpense">
        <option value="Food" selected>Food</option>
        <option value="Housing">Housing</option>
        <option value="Transport">Transport</option>
        <option value="Telecommunications">Telecommunications</option>
        <option value="Healthcare">Healthcare</option>
        <option value="Clothing">Clothing</option>
        <option value="Hygiene">Hygiene</option>
        <option value="Children">Children</option>
        <option value="Entertainment">Entertainment</option>
        <option value="Trip">Trip</option>
        <option value="Training">Training</option>
        <option value="Books">Books</option>
        <option value="Savings">Savings</option>
        <option value="For a golden retirement">For a golden retirement</option>
        <option value=">Debt repayment">Debt repayment</option>
        <option value="Donation">Donation</option>
        <option value="Other expenses">Other expenses</option>
      </select>
    </div>
    <div class="mb-3 pb-2 input-group">
      <i class="fa fa-solid fa-comment"></i>
      <input value="<?php echo e($oldFormData['comment'] ?? ''); ?>" type="text" class="form-control" id="inputDateExpense" placeholder="Comment" name="comment">
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