<?php include $this->resolve("partials/_header.php"); ?>
<?php include $this->resolve("partials/_navbar.php"); ?>


<!-- <div class="container settings">
  <div class="row">
    <div class="col-1"></div>
    <div class="col-10"> -->
<button id="buttonChangeUserName" class="btn btn-lg btn-primary mb-3">Change user name</button>

<form id="formUserName" action="POST">
  <div class="mb-3 pb-2 input-group">
    <i class="fa fa-user"></i>
    <input type="text" class="form-control" id="inputName" placeholder="User name" name="username">
  </div>
  <?php if (array_key_exists('username', $errors)) : ?>
    <div class="bg-gray-100 p-2 text-red-500">
      <?php echo e($errors['username'][0]); ?>
    </div>
  <?php endif; ?>

  <button type="submit" class="btn btn-primary">Confirm</button>

</form>

<!-- 


  </div>

  <div class="col-1"></div>

</div>



</div> -->

<script src="./assets/scripts/settingsScript.js"></script>

<?php include $this->resolve("partials/_footer.php"); ?>