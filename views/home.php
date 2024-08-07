<?php
  session_start();
  if (isset($_SESSION["logIn"]) && $_SESSION["logIn" ] == true) {
    header("Location: ./views/home.php");
  }
  ?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <link href="https://db.onlinewebfonts.com/c/d23daf96b0864afc9aef8dda5acae898?family=ING+Me" rel="stylesheet"
    type="text/css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <link rel="stylesheet" href="../styles/home.css">
</head>

<body>
  <div class="header">
    <header>
      <h1>
        <i class="fa-solid fa-piggy-bank"></i>
        Web home budget
      </h1>
      <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
              <li class="nav-item">
                <i class="fa fa-solid fa-house"></i>
                <a class="nav-link" href="./home.html">Home</a>
              </li>
              <li class="nav-item">
                <i class="fa fa-solid fa-dollar-sign"></i>
                <a class="nav-link" href="#">Add income</a>
              </li>
              <li class="nav-item">
                <i class="fa fa-solid fa-cart-shopping"></i>
                <a class="nav-link" href="./addExpense.html">Add expense</a>
              </li>
              <li class="nav-item">
                <i class="fa fa-solid fa-scale-unbalanced"></i>
                <a class="nav-link" href="./balance.html">Balance</a>
              </li>
              <li class="nav-item">
                <i class="fa fa-solid fa-sign-out"></i>
                <a class="nav-link" href="../index.html">Log out</a>
              </li>
            </ul>
          </div>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
        </div>
      </nav>
    </header>
  </div>

  <div class="container">
    <div class="row">
      <div class="col-1"></div>
      <div class="col-10">
        <div class="px-4 py-5 my-5 text-center">
          <div class="col-lg-6 mx-auto">
            <p class="description fs-4 py-3 px-5 m-0">An online budget for home use helps individuals manage personal
              finances
              by
              tracking
              income and expenses in real-time. It categorizes transactions, sets budget goals, and provides visual
              summaries, enabling better financial control and planning. Users can monitor spending, save more
              effectively,
              and ensure timely bill payments effortlessly.</p>
          </div>
        </div>
      </div>
      <div class="col-1"></div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
</body>

</html>