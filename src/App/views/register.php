<?php include $this->resolve("partials/_header.php"); ?>


<div id="formAuth" class="formAuth m-auto p-5">

  <form action="/register" method="POST">
    <?php include $this->resolve('partials/_csrf.php'); ?>

    <!-- Username -->
    <div class="mb-3 pb-2 input-group">
      <i class="fa fa-user"></i>
      <input value="<?php echo e($oldFormData['username'] ?? ''); ?>" type="text" class="form-control" id="inputName" placeholder="User name" name="username">
    </div>
    <?php if (array_key_exists('username', $errors)) : ?>
      <div class="bg-gray-100 p-2 text-red-500">
        <?php echo e($errors['username'][0]); ?>
      </div>
    <?php endif; ?>
    <!-- Email -->
    <div class="mb-3 pb-2 input-group">
      <i class="fa fa-solid fa-envelope"></i>
      <input value="<?php echo e($oldFormData['email'] ?? ''); ?>" type="email" class="form-control" id="inputEmail" placeholder="Email" name="email" required>
    </div>
    <?php if (array_key_exists('email', $errors)) : ?>
      <div class="bg-gray-100 p-2 text-red-500">
        <?php echo e($errors['email'][0]); ?>
      </div>
    <?php endif; ?>
    <!-- Password -->

    <div class="mb-3 pb-2 input-group">
      <i class="fa fa-lock"></i>
      <input type="password" class="form-control" id="inputPassword" placeholder="Password" name="password" required>
    </div>
    <?php if (array_key_exists('password', $errors)) : ?>
      <div class="bg-gray-100 p-2 text-red-500">
        <?php echo e($errors['password'][0]); ?>
      </div>
    <?php endif; ?>
    <!-- Confirm password -->

    <div class="mb-3 pb-2 input-group">
      <i class="fa fa-lock"></i>
      <input type="password" class="form-control" id="repeatPassword" placeholder="Repeat password" name="confirmPassword" required>
    </div>
    <?php if (array_key_exists('confirmPassword', $errors)) : ?>
      <div class="bg-gray-100 mt-2 p-2 text-red-500">
        <?php echo e($errors['confirmPassword'][0]); ?>
      </div>
    <?php endif; ?>
    <button type="submit" class="btn btn-primary">Register</button>
  </form>
</div>
</body>

</html>