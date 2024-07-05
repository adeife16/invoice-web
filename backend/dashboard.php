<?php

$sales_file = file_get_contents('../db/sales.json');
$order_file = file_get_contents('../db/order.json');
$sales = json_decode($sales_file, true);
$orders = json_decode($order_file, true);
$data = array();


if (isset($_GET['dashdata']))
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
  $year = array_filter($sales, function ($item) use ($year_start, $year_end)
  {
    $date = $item['date_created'];
    return $date >= $year_start && $date <= $year_end;
  });
  $month = array_filter($sales, function ($item) use ($month_start, $month_end)
  {
    $date = $item['date_created'];
    return $date >= $month_start && $date <= $month_end;
  });
  $day = array_filter($sales, function ($item) use ($today)
  {
    $date = $item['date_created'];
    return explode(' ', $date)[0] == $today;
  });

  // print_r($day);
  // exit;

  $total_order = count($orders);


  if ($year)
  {
    foreach ($year as $row)
    {

      if ($row['date_created'] >= $year_start && $row['date_created'] <= $year_end)
      {
        $year_total += intval($row['total']);
      }
    }
  }

  if ($month)
  {
    foreach ($month as $row)
    {
      if ($row['date_created'] >= $month_start && $row['date_created'] <= $month_end)
      {
        $month_total += intval($row['total']);
      }
    }
  }

  if ($day)
  {
    foreach ($day as $row)
    {
      if (explode(' ', $row['date_created'])[0] == $today)
      {
        $day_total += intval($row['total']);
      }
    }
  }


  $json = array("year" => $year_total, "month" => $month_total, "today" => $day_total, "sales" => $total_order);
  print json_encode($json);
}


if (isset($_GET['chartdata']))
{
  $year = date('Y');

  for ($i = 1; $i <= 12; $i++)
  {
    $total = 0;
    if ($i < 10)
    {
      $i = '0' . $i;
    }
    $start = $year . '-' . $i . '-01';
    $end = $year . '-' . $i . '-31';
    $chart = array_filter($sales, function ($item) use ($start, $end)
    {
      $date = $item['date_created'];
      return $date >= $start && $date <= $end;
    });

    foreach ($chart as $row)
    {
      $total += intval($row['total']);
    }
    array_push($data, $total);
  }
  print json_encode($data);
}
