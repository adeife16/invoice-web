<?php
require_once 'config.php';

$data = array();

if(isset($_GET['sales']))
{
	$stmt = "SELECT o.*, s.customer, s.date_created FROM web_order o, web_sales s WHERE o.order_id=s.order_id";
	$sales = mysqli_prepare($con, $stmt);
	mysqli_execute($sales);
	$result = mysqli_stmt_get_result($sales);
	// print_r($result);
	if($result)
	{
		while($row = mysqli_fetch_assoc($result))
		{
			array_push($data, $row);
		}
		$json = array("status" => "success", "data" => $data);
	}
	else
	{
		$json = array("status" => "error");
	}
	print json_encode($json);
}

elseif(isset($_GET['search']) && $_GET['search'] != "")
{
	$query = $_GET['search'];
	$query = '%'.$query.'%';

	$stmt = "SELECT o.*, s.customer, s.date_created FROM web_order o, web_sales s WHERE o.order_id=s.order_id AND o.imei LIKE ?";
	$search = mysqli_prepare($con, $stmt);
	mysqli_stmt_bind_param($search,'s', $query);
	mysqli_execute($search);
	$result = mysqli_stmt_get_result($search);
	// print_r($result);
	if($result)
	{
		while($row = mysqli_fetch_assoc($result))
		{
			array_push($data, $row);
		}
		$json = array("status" => "success", "data" => $data);
	}
	else
	{
		// $json = array("status" => "error");
		$json = array("status" => mysqli_error($con));
	}
	print json_encode($json);
}