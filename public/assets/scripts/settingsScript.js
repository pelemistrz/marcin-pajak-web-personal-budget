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

$("#editMethodsPayment").click(function () {
  $("#buttonsMethodsPayment").toggle("hidden");
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
  $("#expenseCategories").toggle("hidden");
});

$(document).ready(function () {
  $(".editExpenseCategory").on("click", function () {
    $("#editExpenseCategory").modal("show");
    let categoryName = $(this).data("category-name");
    let idCategory = $(this).data("category-id");
    let categoryLimit = $(this).data("transaction-limit");
    $(".modal-body #categoryName").val(categoryName);
    $(".modal-body #category-id").val(idCategory);
    $(".modal-body #categoryTransactionLimit").val(categoryLimit);
  });
});

//Method Payment
$("#buttonAddPaymentMethod").click(function () {
  $("#addPaymentMethod").modal("show");
});
$("#buttonDeletePaymentMethod").click(function () {
  $("#deletePaymentMethod").modal("show");
});

$("#buttonEditPaymentMethod").click(function () {
  $("#editPaymentMethod").modal("show");
});
