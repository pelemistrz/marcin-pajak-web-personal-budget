<?php include $this->resolve("partials/_header.php"); ?>
<?php include $this->resolve("partials/_navbar.php"); ?>


<!-- <div class="container settings">
  <div class="row">
    <div class="col-1"></div>
    <div class="col-10"> -->

<!-- Change username -->
<button id="buttonChangeUserName"
  class="btn btn-lg btn-primary mb-3">Change user name</button>

<form id="formUserName" class="hidden" method="POST" action="/settings/username">

  <?php include $this->resolve('partials/_csrf.php'); ?>

  <div class="mb-3 pb-2 input-group">
    <i class="fa fa-user"></i>
    <input type="text" class="form-control" id="inputName" placeholder="User name" name="username">
  </div>

  <?php if (array_key_exists('username', $errors)) : ?>
    <div class="bg-gray-100 p-2 text-red-500">
      <?php echo e($errors['username'][0]); ?>
    </div>
  <?php endif; ?>
  <button class="btn btn-primary" type="submit">Confirm</button>
</form>

<!-- Change Email -->

<button id="buttonChangeEmail"
  class="btn btn-lg btn-primary mb-3">Change email</button>

<form id="formEmail" class="hidden" action="/settings/email" method="POST">


  <?php include $this->resolve('partials/_csrf.php'); ?>

  <div class="mb-3 pb-2 input-group">
    <i class="fa fa-solid fa-envelope"></i>
    <input value="<?php echo e($oldFormData['email'] ?? ''); ?>" type=" email" class="form-control" id="inputEmail" placeholder="Email" name="email" required>
  </div>
  <?php if (array_key_exists('email', $errors)) : ?>
    <div class="bg-gray-100 p-2 text-red-500">
      <?php echo e($errors['email'][0]); ?>
    </div>
  <?php endif; ?>
  <button class="btn btn-primary" type="submit">Confirm</button>

</form>





<!-- 

  </div>

  <div class="col-1"></div>

</div>



</div> -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"
  integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

<script src="./assets/scripts/settingsScript.js"></script>

<?php include $this->resolve("partials/_footer.php"); ?>