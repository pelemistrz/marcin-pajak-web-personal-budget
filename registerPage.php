<?php
    session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <link rel="stylesheet" href="./styles/regAndLog.css">

</head>

<body>
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