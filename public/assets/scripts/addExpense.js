// const API = "http://personalbudget.local";
const API = "https://budget.marcin-pajak.profesjonalnyprogramista.pl";

const getLimit = async (categoryId) => {
  try {
    let response = await fetch(API + "/expense/limit/" + categoryId);
    let limit = await response.json();
    return limit;
  } catch (e) {
    console.log("Error", e);
  }
};

const getSumOfCategory = async (date, categoryId) => {
  try {
    let res = await fetch(
      `${API}/expense/transaction/sum?i=${categoryId}&d=${date}`
    );

    let sum = await res.json();
    return sum;
  } catch (e) {
    console.log("Error", e);
  }
};

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

$("#categoryOfExpense").change(async function () {
  let selectedOption = $(this).find("option:selected");
  let categoryId = selectedOption.data("category-id");

  try {
    let limit = await getLimit(categoryId);

    let answer = limit
      ? `You set the limit ${limit}.00 PLN for that category`
      : "There is no limit for this category";

    $("#limitInfo").text(answer);
  } catch (e) {
    console.error("blad", e);
  }

  let date = $("#dataOfTransaction").val();

  if (date) {
    try {
      let sum = await getSumOfCategory(date, categoryId);
      let answerSum =
        sum === 0
          ? "You did not spend any money in this month"
          : `You spent ${sum}.00 PLN this month for this category`;

      $("#limitValue").text(answerSum);
    } catch (e) {
      console.error("blad", e);
    }
  }
});

$("#dataOfTransaction").change(async function () {
  let categoryId = $("#categoryOfExpense")
    .find("option:selected")
    .data("category-id");
  let date = $(this).val();

  if (categoryId !== undefined && date !== "") {
    try {
      let sum = await getSumOfCategory(date, categoryId);

      let answer =
        sum === 0
          ? "You did not spend any money in this month"
          : `You spent ${sum}.00 PLN this month for this category`;

      $("#limitValue").text(answer);
    } catch (e) {
      console.error("blad", e);
    }
  }
});

$("#dataOfTransaction,#categoryOfExpense, #inputAmountExpense").on(
  "input change",
  async function () {
    let date = $("#dataOfTransaction").val();
    let categoryId = $("#categoryOfExpense")
      .find("option:selected")
      .data("category-id");
    let amount = $("#inputAmountExpense").val();

    if (date !== "" && categoryId !== undefined && amount !== "") {
      try {
        let sum = await getSumOfCategory(date, categoryId);

        let limit = await getLimit(categoryId);
        let balance = limit - amount - sum;
        console.log(balance);
        if (balance < 0) {
          $("#allInfo").addClass("text-danger");
        } else {
          $("#allInfo").removeClass("text-danger");
        }

        let leftAnswer = `Limit balance after operation ${
          limit - amount - sum
        }`;
        $("#cashLeft").text(leftAnswer);
      } catch (e) {
        console.error("blad", e);
      }
    }
  }
);
