<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Are you sure? All your data will be gone</h1>

      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

        <form action="/settings/deleteaccount" method="POST">
          <?php include $this->resolve('partials/_csrf.php'); ?>
          <input type="hidden" name="_METHOD" value="DELETE" />

          <button type="submit" class="btn btn-danger">Delete account</button>
        </form>
      </div>
    </div>
  </div>
</div>