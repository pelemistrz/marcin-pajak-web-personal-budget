$("#buttonChangeUserName").click(function () {
  $("#formUserName").toggle("hidden");
});

$("#buttonChangeEmail").click(function () {
  $("#formEmail").toggle("hidden");
});

$("#buttonChangePassword").click(function () {
  $("#formPassword").toggle("hidden");
});

$("#editIncomesCategory").click(function () {
  $("#buttonsIncomesCategory").toggle("hidden");
});

$("#editExpensesCategory").click(function () {
  $("#buttonsExpensesCategory").toggle("hidden");
});
//Income
$("#buttonAddIncomeCategory").click(function () {
  $("#addIncomeCategory").modal("show");
});

$("#buttonDeleteIncomeCategory").click(function () {
  $("#deleteIncomeCategory").modal("show");
});

$("#buttonEditIncomeCategory").click(function () {
  $("#editIncomeCategory").modal("show");
});
//Expense
$("#buttonAddExpenseCategory").click(function () {
  $("#addExpenseCategory").modal("show");
});
$("#buttonDeleteExpenseCategory").click(function () {
  $("#deleteExpenseCategory").modal("show");
});

$("#buttonEditExpenseCategory").click(function () {
  $("#editExpenseCategory").modal("show");
});
