<?php
require 'config.php';


$data = array();


if(isset($_GET['dashdata']))
{
  $year_total = 0;
  $month_total = 0;
  $day_total = 0;
  $year = date('Y');
  $month = date('m');
  $today = date('Y-m-d');
  $year_start = $year . '-' . '01-01';
  $year_end = $year . '-' . '12-31';
  $month_start = $year . '-' . $month . '-01';
  $month_end = $year . '-' . $month . '-31';
  $year = mysqli_query($con,"SELECT * FROM web_sales WHERE date_created BETWEEN '$year_start' AND '$year_end'");
  $month = mysqli_query($con,"SELECT * FROM web_sales WHERE date_created BETWEEN '$month_start' AND '$month_end'");
  $day = mysqli_query($con,"SELECT * FROM web_sales WHERE date_created = '$today'");
  $count = mysqli_query($con,"SELECT COUNT(*) as number FROM web_order ");


  if($year)
  {
    while($row = mysqli_fetch_assoc($year))
    {
      $year_total += intval($row['total']);
    }

  }
  if($month)
  {
    while($row = mysqli_fetch_assoc($month))
    {
      $month_total += intval($row['total']);
    }

  }
  if($day)
  {
    while($row = mysqli_fetch_assoc($day))
    {
      $day_total += intval($row['total']);
    }

  }
  if($count)
  {
    $row = mysqli_fetch_assoc($count);
    $sales = $row['number'];
  }
  $json = array("year" => $year_total, "month" => $month_total, "today" => $day_total, "sales" => $sales);
  print json_encode($json);

}



// // get all new requests
// if(isset($_POST['getRequest']))
// {
//   $get_req = mysqli_query($con, "SELECT * FROM employment WHERE view = 'no' ORDER BY id DESC LIMIT 5");
//   if($get_req)
//   {
//     while($row = mysqli_fetch_assoc($get_req))
//     {
//       array_push($json, $row);
//     }
//     print json_encode($json);
//   }
//   else
//   {
//     $get_req = mysqli_query($con, "SELECT * FROM employment WHERE view = 'yes' ORDER BY id DESC LIMIT 5");
//     if($get_req)
//     {
//       while($row = mysqli_fetch_assoc($get_req))
//       {
//         array_push($json, $row);
//       }
//       print json_encode($json);
//     }
//     else
//     {

//     }
//   }
// }
