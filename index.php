
<?php
  //session_start();
  //if (isset($_SESSION["loggedId"])) {
  //  header("Location: mainPage.php");
   // exit();
 // }

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Personal Budget</title>
  <link href="https://db.onlinewebfonts.com/c/d23daf96b0864afc9aef8dda5acae898?family=ING+Me" rel="stylesheet"
    type="text/css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <link rel="stylesheet" href="./styles/styleIndex.css">
</head>

<body>
  <div class="container col-xl-10 col-xxl-8 px-4 py-5 mt-5">
    <div class="row align-items-center g-lg-5 py-5">
      <div class="col-lg-7 text-center text-lg-start">
        <h1 class="display-4 fw-bold lh-1 mb-3">Personal Budget
        </h1>
        <p class="col-lg-10 fs-4">Work out where your money going. Budgeting is one of the best ways to keep your
          finances on track. This budget planner makes it easy to get started.</p>
      </div>
      <div class="col-md-10 mx-auto col-lg-5">
        <form class="p-4 p-md-5 border rounded-3 bg-body-tertiary">
          <div class="form-floating mb-3">
            <a href="./login.php" class="w-100 btn btn-lg btn-primary">
              Log in
            </a>
          </div>
          <a class="w-100 btn btn-lg btn-primary" href="./registerPage.php">
            Register</a>
        </form>
      </div>
    </div>
  </div>
</body>

</html>