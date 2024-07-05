<?php

$sales_file = file_get_contents('../db/sales.json');
$order_file = file_get_contents('../db/order.json');
$sales = json_decode($sales_file, true);
$orders = json_decode($order_file, true);
$data = array();

function getSalesWithOrders($sales, $orders)
{
	$data = [];
	foreach ($orders as $order)
	{
		foreach ($sales as $sale)
		{
			if ($order['order_id'] == $sale['order_id'])
			{
				$combined = $order;
				$combined['customer'] = $sale['customer'];
				$combined['date_created'] = $sale['date_created'];
				$data[] = $combined;
			}
		}
	}
	return $data;
}

if (isset($_GET['sales']))
{
	$data = getSalesWithOrders($sales, $orders);
	$json = array("status" => "success", "data" => $data);
	print json_encode($json);
}

elseif (isset($_GET['search']) && $_GET['search'] != "")
{
	$query = $_GET['search'];
	$query = strtolower($query);
	$search_results = [];

	foreach ($orders as $order)
	{
		if (strpos(strtolower($order['imei']), $query) !== false || strpos(strtolower($order['product']), $query) !== false)
		{
			foreach ($sales as $sale)
			{
				if ($order['order_id'] == $sale['order_id'])
				{
					$combined = $order;
					$combined['customer'] = $sale['customer'];
					$combined['date_created'] = $sale['date_created'];
					$search_results[] = $combined;
				}
			}
		}
	}

	if (!empty($search_results))
	{
		$json = array("status" => "success", "data" => $search_results);
	}
	else
	{
		$json = array("status" => "error", "message" => "No matching records found");
	}
	print json_encode($json);
}
