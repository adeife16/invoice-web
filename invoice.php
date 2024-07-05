<?php
$title = "Invoice";
require_once 'header.php';
?>
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800"><?php print $title; ?></h1>
</div>
<div class="row justify-content-center">
	<div class="col-md-12">
		<form class="from" id="invoice-form" method="post" action="" enctype="multipart/formdata">
			<button type="button" class="btn btn-primary float-right" onclick="addRow()" id="add"><i class="fas fa-plus"></i>Add Product</button>

			<table class="table">
				<tr>
					<th>Product</th>
					<th>IMEI/Serial</th>
					<th>Color</th>
					<th>Memory</th>
					<th>Price</th>
					<th>Action</th>
				</tr>
				<tbody class="product-table" id="product-table">
							<tr id="0">
								<td>
									<input type="text" class="form-control product-0" id="product-0" name="product-0" placeholder="Product">
								</td>
								<td>
									<input type="text" class="form-control imei-0" id="imei-0" name="imei-0" placeholder="IMEI/Serial">
								</td>
								<td>
									<input type="text" class="form-control color-0" id="color-0" name="color-0" placeholder="Color">
								</td>
								<td>
									<input type="text" class="form-control memory-0" id="memory-0" name="memory-0" placeholder="Memory">
								</td>
								<td>
									<input type="text" class="form-control price-0" id="price-0" name="price-0" placeholder="Price" oninput="total()">
								</td>
								<td>
									<button type="button" class="btn btn-danger cancel" id="cancel-0" value="0"><i class="fas fa-times"></i></button>
								</td>
							</tr>
				</tbody>
			</table>
			</form>
	</div>
</div>		

<div class="row mt-5">
	<div class="col-md-8">
		<input type="hidden" name="invoice-id" id="invoice-id" >
		<div class="form-group">
			<input type="text" name="customer" id="customer" class="form-control" placeholder="Customer Name">
		</div>
		<div class="form-group">
			<input type="text" name="phone" id="phone" class="form-control" placeholder="Customer Phone">
		</div>
		<div class="form-group">
			<textarea class="form-control" id="address" name="address" placeholder="Customer Address"></textarea> 
		</div>
		<div class="form-group">
			<label>Payment Mode</label>
			<select class="form-control" id="payment">
				<option value="Cash">Cash</option>
				<option value="Transfer">Transfer</option>
				<option value="Cash and Transfer">Cash and Transfer</option>
			</select>
		</div>
	</div>
</div>

<div class="control mb-4">
	<div class="row">
		<div class="col-md-8">
			<a href="" class="btn btn-danger" id="clear"><i class="fas fa-trash"></i> Clear Form</a>

			<button class="btn btn-success" id="save" onclick="save()"><i class="fas fa-save" ></i> Save Invoice</button>
			<button class="btn btn-warning" id="print" onclick="printInvoice()"><i class="fas fa-print"></i> Print Invoice</button>
		</div>
		<div class="col-md-4">
			<div class="float-right">
				<span  style="font-size: 26px; font-weight: bolder;">Total</span>
				<span class="color-green" id="total" style="font-size: 26px; font-weight: bolder;">&#8358;0</span>
			</div>
		</div>
	</div>
</div>

<?php 
	require_once 'footer.php';
 ?>