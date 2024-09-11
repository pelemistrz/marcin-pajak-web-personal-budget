<div class="modal fade" id="deletePaymentMethod" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete income category</h5>
      </div>
      <div class="modal-body">

        <form id="deleteIncomeCategory" method="POST" action="/settings/deleteincomecategory">

          <?php include $this->resolve('partials/_csrf.php'); ?>

          <input type="hidden" name="_METHOD" value="DELETE" />

          <?php include $this->resolve('partials/_csrf.php'); ?>
          <input type="hidden" name="_METHOD" value="DELETE" />

          <fieldset>


            <?php foreach ($incomesCategory as $expenseCategory) : ?>
              <div>
                <label>
                  <input type="radio" name="incomeCategoryId" value=" <?php echo e($expenseCategory['id']); ?>" checked />
                  <?php echo e($expenseCategory['name']); ?>
                </label>
              </div>
            <?php endforeach; ?>
          </fieldset>


          <button class="btn btn-primary" type="submit">Delete</button>
        </form>
      </div>

    </div>
  </div>
</div>