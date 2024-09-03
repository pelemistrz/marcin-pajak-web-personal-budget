<?php include $this->resolve("partials/_header.php"); ?>

<!-- Email -->
<form action="/login" method="POST">
  <div class="mb-3 pb-2 input-group">
    <i class="fa fa-solid fa-envelope"></i>
    <input type=" email" class="form-control" id="inputEmail" placeholder="Email" name="email" required>
  </div>
  <!-- Password -->
  <div class="mb-3 pb-2 input-group">
    <i class="fa fa-lock"></i>
    <input type="password" class="form-control" id="inputPassword" placeholder="Password" name="password" required>
  </div>
  <input class="btn btn-primary" type="submit" value="Log in">
</form>
</body>

</html>