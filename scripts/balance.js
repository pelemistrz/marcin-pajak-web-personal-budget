google.charts.load("current", {
  packages: ["corechart"],
});
google.charts.setOnLoadCallback(drawChart);

function drawChart() {
  var data = google.visualization.arrayToDataTable([
    ["Expense", "How much"],
    ["Telecomunications", 1000],
    ["Transport", 650],
    ["Housing", 3000],
  ]);

  var options = {
    title: "Your expence balance from given period",
  };

  var chart = new google.visualization.PieChart(
    document.getElementById("piechart")
  );

  chart.draw(data, options);
}

$("#mySelect").change(function () {
  var opval = $(this).val();
  if (opval == "dateRange") {
    $("#rangeModal").modal("show");
  }
});
