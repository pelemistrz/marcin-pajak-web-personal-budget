<?php include $this->resolve("partials/_header.php"); ?>

<?php include $this->resolve("partials/_navbar.php"); ?>

<div class="container backimage">


  <div class="row d-flex justify-content-center mb-5">
    <div class="col-1"></div>
    <div class="col-5 d-flex justify-content-end">
      <div class="form ">
        <h3>Insert data for expense</h3>

        <form action="/expense" method="POST">
          <?php include $this->resolve('partials/_csrf.php'); ?>
          <!-- Amount -->
          <div class="mb-3 pb-2 input-group">
            <span class="input-group-text">PL</span>
            <input value="<?php echo e($oldFormData['amount'] ?? ''); ?>" type="number" class="form-control" id="inputAmountExpense" placeholder="Amount" name="amount">
            <span class="input-group-text">.00</span>
          </div>
          <?php if (array_key_exists('amount', $errors)) : ?>
            <div class="bg-gray-100 mt-2 p-2 text-red-500">
              <?php echo e($errors['amount'][0]); ?>
            </div>
          <?php endif; ?>

          <!-- Date -->

          <div class="mb-3 pb-2 input-group">
            <input id="dataOfTransaction" value="<?php echo e($oldFormData['date'] ?? ''); ?>" id="dateExpense" class="form-control" type="date" value="" placeholder="Date" name="date" />
          </div>
          <?php if (array_key_exists('date', $errors)) : ?>
            <div class="bg-gray-100 mt-2 p-2 text-red-500">
              <?php echo e($errors['date'][0]); ?>
            </div>
          <?php endif; ?>

          <!-- Method of payment -->
          <div class="mb-3 pb-2 input-group">

            <select class="form-select" id="methodOfPayment" name="methodOfPayment" required>
              <option selected disabled>Choose method of payment</option>
              <?php foreach ($methodsOfPayment as $methodOfPayment) : ?>
                <option value="<?php echo e($methodOfPayment['name']); ?>">
                  <?php echo e($methodOfPayment['name']); ?>
                </option>
              <?php endforeach; ?>

            </select>
          </div>
          <!-- Expense category -->
          <div class="mb-3 pb-2 input-group">
            <select class="form-select" id="categoryOfExpense" name="categoryOfExpense" required>
              <option selected disabled>Choose category </option>

              <?php foreach ($expensesCategory as $expenseCategory) : ?>

                <option data-category-id="<?php echo ($expenseCategory['id']); ?>" value="<?php echo e($expenseCategory['name']); ?>">

                  <?php echo e($expenseCategory['name']); ?>
                </option>
              <?php endforeach; ?>

            </select>
          </div>


          <!-- comment -->
          <div class="mb-3 pb-2 input-group">
            <span class="input-group-text" id="basic-addon1">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chat-fill" viewBox="0 0 16 16">
                <path d="M8 15c4.418 0 8-3.134 8-7s-3.582-7-8-7-8 3.134-8 7c0 1.76.743 3.37 1.97 4.6-.097 1.016-.417 2.13-.771 2.966-.079.186.074.394.273.362 2.256-.37 3.597-.938 4.18-1.234A9 9 0 0 0 8 15" />
              </svg>
            </span>
            <input value="<?php echo e($oldFormData['comment'] ?? ''); ?>" type="text" class="form-control" id="inputDateExpense" placeholder="Comment optional" name="comment">

            <?php if (array_key_exists('comment', $errors)) : ?>
              <div class="bg-gray-100 mt-2 p-2 text-red-500">
                <?php echo e($errors['comment'][0]); ?>
              </div>
            <?php endif; ?>
          </div>
          <!-- Buttons -->
          <div class="buttons">
            <a href="/main" class="btn btn-danger">Cancel</a>
            <button type="submit" class="btn btn-success">Add</button>
          </div>
        </form>
      </div>
    </div>



    <div class="col-5 text-secondary d-flex flex-column justify-content-around pt-5 ">
      <div class="limitInfo">
        <p class="h4 p-0">Limit Info</p> <span id="limitInfo">Category requried</span>
      </div>
      <div class="limitInfo">
        <p class="h4 p-0">Limit value</p> <span id="limitValue">Category and date required</span>
      </div>
      <div class="limitInfo">
        <p class="h4 p-0">Cash left</p> <span id="cashLeft">category,date & amount required</span>
      </div>


    </div>
    <div class="col-1"></div>
  </div>
</div>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"
  integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

<script src="./assets/scripts/addExpense.js"></script>

<?php include $this->resolve("partials/_footer.php"); ?>