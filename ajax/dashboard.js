// Get all dashboard data
function getDashboardData(){
  $.ajax({
    url: 'backend/dashboard.php?dashdata',
    type: 'GET'
  })
  .done(function(response) {
    data = JSON.parse(response);
    // console.log(data);
    $("#year").html(nairaConvert(data.year));
    $("#month").html(nairaConvert(data.month));
    $("#today").html(nairaConvert(data.today));
    $("#sales").html(data.sales + " Products");
    // showRiders(riders);
    // showRidersEmploy(ridersEmploy);
    // showCompanies(companies);
    // showRequest(request)
  })
  // .fail(function() {
  //   console.log("error");
  // })
  // .always(function() {
  //   console.log("complete");
  // });

}

// Get new Requests
//
// function getNewRequest(){
//   $.ajax({
//     url: 'backend/dashboard.php',
//     type: 'POST',
//     cache: false,
//     data: {getRequest: 'value1'}
//   })
//   .done(function(response) {
//     data = JSON.parse(response);
//     console.log(data);
//     showNewRequest(data);
//   })
//   // .fail(function() {
//   //   console.log("error");
//   // })
//   // .always(function() {
//   //   console.log("complete");
//   // });
//
// }
