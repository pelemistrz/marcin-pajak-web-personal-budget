<div class="modal fade" id="addPaymentMethod" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add payment method</h5>
      </div>
      <div class="modal-body">

        <form id="addPaymentMethod" method="POST" action="/settings/addpaymentmethod">

          <?php include $this->resolve('partials/_csrf.php'); ?>

          <div class="mb-3 pb-2 input-group">

            <input type="text" class="form-control" id="inputName" placeholder="Payment method name" name="paymentMethodName">
          </div>
          <?php if (array_key_exists('paymentMethodName', $errors)) : ?>
            <div class="bg-gray-100 p-2 text-red-500">
              <?php echo e($errors['paymentMethodName'][0]); ?>
            </div>
          <?php endif; ?>
          <button class="btn btn-primary" type="submit">Add</button>
        </form>
      </div>

    </div>
  </div>
</div>