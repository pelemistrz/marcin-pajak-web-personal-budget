<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Balance</title>
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
              <li class="nav-item ms-5" id="period">
                <select id="mySelect">
                  <option value="" selected>Choose period</option>
                  <option value="">Current month</option>
                  <option value="">Previous month</option>
                  <option value="">Current month</option>
                  <option value="dateRange">Date range</option>
                </select>
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


  <!-- Modal -->
  <div class="modal fade" id="rangeModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header py-2 my-2">
          <h1 class="modal-title fs-5 text-left py-2" id="exampleModalLabel">Choose period:</h1>
        </div>
        <div class="modal-body">

          <h4 class="modal-title fs-5" id="exampleModalLabel">Date from:</h4>
          <form action="" class="d-flex flex-row">
            <div class="mb-3 pb-2 input-group">
              <!-- <label for="dateFrom">Date from:</label> -->
              <input name="dateFrom" id="dateFrom" class="form-control" type="date" value="" placeholder="Date" />
            </div>
            <div class="mb-3 pb-2 input-group">
              <!-- <label for="dateTo">Date to:</label> -->
              <input name="dateTo" id="dateTo" class="form-control" type="date" value="" placeholder="Date" />
            </div>
          </form>
          <button type="button" class="btn btn-primary">Ok</button>
        </div>

      </div>
    </div>
  </div>









  <div class="container mt-5">
    <div class="row">
      <div class="col-1"></div>
      <div class="col-10">
        <h3>Current month</h3>
      </div>
      <div class="col-1"></div>
    </div>
    <div class="row">
      <div class="col-1"></div>
      <div class="col-5">
        <table>
          <tr>
            <td colspan="3">
              <h3 class="report-h">Incomes</h3>
            </td>
          </tr>

          <tr>
            <td>
              <p>Paycheck 3000</p>
            </td>
          </tr>
          <tr>
            <td>
              <p>2022-08-12 3000 wypłata <i class="fa-solid fa-pen-to-square"></i> <i class="fa-solid fa-trash"></i></p>
              <hr>
            </td>
          </tr>

          <tr>
            <td>
              <p>Bank Interest 300</p>
            </td>
          </tr>
          <tr>
            <td>
              <p>2022-08-10 300 <i class="fa-solid fa-pen-to-square"></i> <i class="fa-solid fa-trash"></p></i>
              <hr>
            </td>
          </tr>



        </table>
      </div>
      <div class="col-5">
        <table>
          <tr>
            <td>
              <h3 class="report-h">Expenses</h3>
            </td>
          </tr>

          <tr>
            <td>
              <p>Telecommunications 1000</p>
            </td>
          </tr>
          <tr>
            <td>
              <p>2022-08-12 1000 internet <i class="fa-solid fa-pen-to-square"></i> <i class="fa-solid fa-trash"></i>
              </p>
              <hr>

            </td>
          </tr>

          <tr>
            <td>
              <p>Housing 3000</p>
            </td>
          </tr>
          <tr>
            <td>
              <p>2022-08-01 3000 rata kredytu <i class="fa-solid fa-pen-to-square"></i> <i
                  class="fa-solid fa-trash"></i></p>
              <hr>
            </td>
          </tr>

          <tr>
            <td>
              <p>Transport 650</p>
            </td>
          </tr>
          <tr>
            <td>
              <p>2022-08-09 650 paliwo <i class="fa-solid fa-pen-to-square"></i> <i class="fa-solid fa-trash"></i></p>
              <hr>
            </td>
          </tr>
        </table>
      </div>
      <div class="col-1"></div>
    </div>
  </div>

  <div class="container mt-5">
    <div class="row">
      <div class="col-1"></div>
      <div class="col-10">
        <div class="balance pb-1 pt-2">
          <p>Sum of incomes: 3300 <br>
            Sum of expenses: 4650</p>
          <hr>
          <p>Balance: -1350</p>
          <hr>
          <p>You have to earn more or spend less</p>
        </div>
      </div>
      <div class="col-1"></div>
    </div>
    <div class="row mb-5 mt-5">
      <div class="col-1"></div>
      <div class="col-10">


        <div id="piechart"></div>


      </div>
      <div class="col-1"></div>
    </div>
  </div>




  <script src="https://code.jquery.com/jquery-3.7.1.min.js"
    integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
  <script src="../scripts/balance.js"></script>
</body>

</html>