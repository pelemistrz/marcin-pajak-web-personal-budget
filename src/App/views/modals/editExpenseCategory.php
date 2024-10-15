<div class="modal fade" id="editExpenseCategory" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit expense category </h5>
      </div>
      <div class="modal-body">

        <form id="editIncomeCategory" method="POST" action="/settings/editexpensecategory">
          <?php include $this->resolve('partials/_csrf.php'); ?>


          <input type="text" hidden name="categoryId" id="category-id" value="">

          <div class="mb-3 pb-2 input-group">

            <label for="categoryName">Category Name</label> <input value="" type=" text" class="form-text" id="categoryName" name="categoryName">
          </div>

          <div class="input-group">
            <label for="categoryTransactionLimit">Transaction limit</label>
            <input type="number" class="form-text" value="" name="categoryTransactionLimit" id="categoryTransactionLimit" val="">
          </div>

          <button class="mt-2 btn btn-primary" type="submit">Confirm</button>
        </form>
      </div>

    </div>
  </div>
</div>