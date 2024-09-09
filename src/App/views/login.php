<?php include $this->resolve("partials/_header.php"); ?>

<!-- Email -->
<div id="formAuth" class="formAuth m-auto p-5">
  <form action="/login" method="POST">
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
    <input class="btn btn-primary" type="submit" value="Log in">
  </form>
</div>
</body>

</html>