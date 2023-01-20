<?php
	require_once 'config.php';

	$data = array();

	// get invouce id
	if(isset($_GET['getid']))
	{
		$stmt = "SELECT count(*) as num FROM web_sales";
		$id = mysqli_prepare($con, $stmt);
		mysqli_execute($id);
		$result = mysqli_stmt_get_result($id);
		// print_r($result);
		if($result)
		{
			$row = mysqli_fetch_assoc($result);
			print $row['num'];
		}
		else
		{
			print "here";
		}

	}

	// save invoice
	if(isset($_POST['save']) && $_POST['lot'] != "")
	{
		$error = 0;
		$order_id = str_shuffle(substr(md5(time().mt_rand().time()), 0,20));
		$invoice_id = $_POST['save'];
		$name = $_POST['name'];
		$phone = $_POST['phone'];
		$addr = $_POST['address'];
		$list = $_POST['lot'];
		$product = "";
		$imei = "";
		$color = "";
		$memory = "";
		$price = "";
		$total = 0;

		for($i=0; $i<count($list); $i++)
		{
			$product = $list[$i]['product'];
			$imei = $list[$i]['imei'];
			$color = $list[$i]['color'];
			$memory = $list[$i]['memory'];
			$price = $list[$i]['price'];
			$total += intval($price);

			$stmt = "INSERT INTO web_order(order_id, invoice_id, product, imei, color, memory, amount) VALUES(?,?,?,?,?,?,?)";
			$save = mysqli_prepare($con, $stmt);
			mysqli_stmt_bind_param($save, 'ssssssi', $order_id, $invoice_id, $product, $imei, $color, $memory, $price);
			if(mysqli_execute($save))
			{

			}
			else
			{
				$error = 1;
				print mysqli_error($con);
				break;
			}
		}
		if($error != 1)
		{
			$stmt2 = "INSERT INTO web_sales(order_id, invoice_id, customer, address, phone, total, date_created) VALUES(?,?,?,?,?,?,NOW())";

			$sales = mysqli_prepare($con, $stmt2);
			mysqli_stmt_bind_param($sales, 'sssssi', $order_id, $invoice_id, $name, $addr, $phone, $total);
			if(mysqli_execute($sales))
			{
				print "success";
			}
			else
			{
				print mysqli_error($con);
			}
		}


	}