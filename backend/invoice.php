<?php

function getJsonData($filePath)
{
	if (!file_exists($filePath))
	{
		return [];
	}

	$fileContents = file_get_contents($filePath);
	if ($fileContents === false)
	{
		return [];
	}

	$data = json_decode($fileContents, true);
	if (json_last_error() !== JSON_ERROR_NONE)
	{
		return [];
	}

	return $data;
}

$sales = getJsonData('../db/sales.json');
$orders = getJsonData('../db/order.json');

if (isset($_GET['getid']))
{
	echo count($sales);
	exit;
}

if (isset($_POST['save']) && !empty($_POST['lot']))
{
	$order_id = str_shuffle(substr(md5(time() . mt_rand()), 0, 20));
	$invoice_id = $_POST['save'];
	$name = $_POST['name'];
	$phone = $_POST['phone'];
	$addr = $_POST['address'];
	$payment = $_POST['payment'];
	$list = $_POST['lot'];
	$total = 0;

	foreach ($list as $item)
	{
		$product = $item['product'];
		$imei = $item['imei'];
		$color = $item['color'];
		$memory = $item['memory'];
		$price = $item['price'];
		$total += intval($price);

		$orders[] = [
			"order_id" => $order_id,
			"invoice_id" => $invoice_id,
			"product" => $product,
			"imei" => $imei,
			"color" => $color,
			"memory" => $memory,
			"amount" => $price
		];
	}

	if (file_put_contents('../db/order.json', json_encode($orders, JSON_PRETTY_PRINT)) === false)
	{
		echo "Failed to save orders.";
		exit;
	}

	$sales_data = [
		"id" => count($sales),
		"order_id" => $order_id,
		"invoice_id" => $invoice_id,
		"customer" => $name,
		"address" => $addr,
		"phone" => $phone,
		"total" => $total,
		"payment" => $payment,
		"date_created" => date("Y-m-d H:i:s")
	];

	$sales[] = $sales_data;

	if (file_put_contents('../db/sales.json', json_encode($sales, JSON_PRETTY_PRINT)) === false)
	{
		echo "Failed to save sales.";
		exit;
	}

	echo "success";
}
