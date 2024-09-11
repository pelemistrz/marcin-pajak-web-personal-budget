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
  $("#formIncomesCategory").toggle("hidden");
});

$("#buttonAddIncomeCategory").click(function () {
  $("#addIncomeCategory").modal("show");
});

$("#buttonDeleteIncomeCategory").click(function () {
  $("#deleteIncomeCategory").modal("show");
});

$("#buttonEditIncomeCategory").click(function () {
  $("#editIncomeCategory").modal("show");
});
