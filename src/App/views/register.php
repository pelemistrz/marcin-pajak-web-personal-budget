<?php include $this->resolve("partials/_header.php"); ?>

<form action="./scripts/register.php" method="POST">
  <div class="mb-3 pb-2 input-group">
    <i class="fa fa-user"></i>
    <input type="text" class="form-control" id="inputName" placeholder="User name" name="username">
  </div>
  <div class="mb-3 pb-2 input-group">
    <i class="fa fa-solid fa-envelope"></i>
    <input type="email" class="form-control" id="inputEmail" placeholder="Email" name="email" required>
  </div>
  <div class="mb-3 pb-2 input-group">
    <i class="fa fa-lock"></i>
    <input type="password" class="form-control" id="inputPassword" placeholder="Password" name="password" required>
  </div>

  <div class="mb-3 pb-2 input-group">
    <i class="fa fa-lock"></i>
    <input type=" password" class="form-control" id="repeatPassword" placeholder="Repeat password" name="passwordRepeated" required>
  </div>
  <button type="submit" class="btn btn-primary">Register</button>
</form>
</body>

</html>