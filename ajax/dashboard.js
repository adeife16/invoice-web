// Get all dashboard data
function getDashboardData(){
  $.ajax({
    url: 'backend/dashboard.php?dashdata',
    type: 'GET'
  })
  .done(function(response) {
    data = JSON.parse(response);
    $("#year").html(nairaConvert(data.year));
    $("#month").html(nairaConvert(data.month));
    $("#today").html(nairaConvert(data.today));
    $("#sales").html(data.sales + " Products");

    $.ajax({
      url: 'backend/dashboard.php?chartdata',
      type: 'GET'
    })
    .done(function(res){
      data = JSON.parse(res);
      console.log(data);
      showChart(data);

    })

  })

}