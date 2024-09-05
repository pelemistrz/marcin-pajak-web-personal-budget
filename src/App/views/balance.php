<?php include $this->resolve("partials/_header.php"); ?>

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
              <a class="nav-link" href="./main">Home</a>
            </li>
            <li class="nav-item">
              <i class="fa fa-solid fa-dollar-sign"></i>
              <a class="nav-link" href="/income">Add income</a>
            </li>
            <li class="nav-item">
              <i class="fa fa-solid fa-cart-shopping"></i>
              <a class="nav-link" href="./expense">Add expense</a>
            </li>
            <li class="nav-item">
              <i class="fa fa-solid fa-scale-unbalanced"></i>
              <a class="nav-link" href="./balance">Balance</a>
            </li>
            <li class="nav-item">
              <i class="fa fa-solid fa-sign-out"></i>
              <a class="nav-link" href="/logout">Log out</a>
            </li>
            <li class="nav-item ms-5" id="period">
              <select id="mySelect">
                <option value="" selected>Choose period</option>
                <option value="">Current month</a></option>
                <option value="">Previous month</option>
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

        <form action="/balance" method="GET" class="d-flex flex-row">

          <!-- <?php include $this->resolve('partials/_csrf.php'); ?> -->

          <div class="mb-3 pb-2 input-group">
            <!-- <label for="dateFrom">Date from:</label> -->
            <input name="s" id="dateFrom" class="form-control" type="date" value="" placeholder="Date" />
          </div>
          <div class="mb-3 pb-2 input-group">
            <!-- <label for="dateTo">Date to:</label> -->
            <input name="e" id="dateTo" class="form-control" type="date" value="" placeholder="Date" />
          </div>

          <div>
            <button type="submit" class="btn btn-primary">Ok</button>
          </div>
        </form>

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

      <!-- Incomes -->
      <table>
        <tr>
          <td colspan="3">
            <h3 class="report-h">Incomes</h3>
          </td>
        </tr>

        <?php foreach ($userIncomes as $income) : ?>
          <tr>
            <td>
              <p><?php echo e($income['name']); ?> <?php echo e($income['amount']); ?></p>
            </td>
          </tr>
          <tr>
            <td>
              <p><?php echo e($income['date_of_income']); ?> <?php echo e($income['income_comment']); ?> <a href="/income/<?php echo e($income['id']); ?>"><i class="fa-solid fa-pen-to-square"></i></a>

              <form action="/income/<?php echo e($income['id']); ?>" method="POST">
                <input type="hidden" name="_METHOD" value="DELETE" />
                <?php include $this->resolve('partials/_csrf.php'); ?>

                <button type="submit"><i class="fa-solid fa-trash"></i></button>
              </form>


              <hr>
            </td>
          </tr>
        <?php endforeach; ?>

        <!-- Expenses -->
      </table>
    </div>
    <div class="col-5">
      <table>
        <tr>
          <td>
            <h3 class="report-h">Expenses</h3>
          </td>
        </tr>

        <?php foreach ($userExpenses as $expense) : ?>
          <tr>
            <td>
              <p><?php echo e($expense['name']); ?> <?php echo e($expense['amount']); ?></p>
            </td>
          </tr>
          <tr>
            <td>
              <p><?php echo e($expense['date_of_expense']); ?> <?php echo e($expense['method']); ?> <?php echo e($expense['expense_comment']); ?>
                <a href="/expense/<?php echo e($expense['id']); ?>"> <i class="fa-solid fa-pen-to-square"></i>
                </a>

              <form action="/expense/<?php echo e($expense['id']); ?>" method="POST">
                <input type="hidden" name="_METHOD" value="DELETE" />
                <?php include $this->resolve('partials/_csrf.php'); ?>

                <button type="submit"><i class="fa-solid fa-trash"></i></button>
              </form>



              </p>
              <hr>
            </td>
          </tr>
        <?php endforeach; ?>

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
        <p>Sum of incomes: <?php echo e($incomesSum['incomesSum']); ?> <br>
          Sum of expenses: <?php echo e($expensesSum['expensesSum']); ?></p>
        <hr>
        <p>Balance: <?php echo e($balance); ?></p>
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



<?php include $this->resolve("partials/_footer.php"); ?>