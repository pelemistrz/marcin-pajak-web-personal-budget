<div class="modal fade" id="deletePaymentMethod" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete income category</h5>
      </div>
      <div class="modal-body">

        <form id="deletePaymentMethod" method="POST" action="/settings/deletepaymentmethod">

          <?php include $this->resolve('partials/_csrf.php'); ?>
          <input type="hidden" name="_METHOD" value="DELETE" />


          <fieldset>
            <?php foreach ($methodsOfPayment as $methodOfPayment) : ?>
              <div>
                <label>
                  <input type="radio" name="methodOfPaymentId" value=" <?php echo e($methodOfPayment['id']); ?>" />
                  <?php echo e($methodOfPayment['name']); ?>
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