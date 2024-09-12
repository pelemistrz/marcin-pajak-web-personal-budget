<div class="modal fade" id="editIncomeCategory" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Choose category to edit and insert new name </h5>
      </div>
      <div class="modal-body">

        <form id="editIncomeCategory" method="POST" action="/settings/editincomecategory">

          <?php include $this->resolve('partials/_csrf.php'); ?>
          <div class="mb-3 pb-2 input-group">
            <input value="" type=" text" class="form-control" id="inputCategory" placeholder="New category name" name="newCategoryName" required>
          </div>
          <fieldset>
            <?php foreach ($incomesCategory as $methodOfPayment) : ?>
              <div>
                <label>
                  <input type="radio" name="incomeCategoryId" value=" <?php echo e($methodOfPayment['id']); ?>" checked />
                  <?php echo e($methodOfPayment['name']); ?>
                </label>
              </div>
            <?php endforeach; ?>
          </fieldset>
          <button class="btn btn-primary" type="submit">Confirm</button>
        </form>
      </div>
    </div>
  </div>
</div>