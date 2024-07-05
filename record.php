<?php
$title = "Record";
require_once 'header.php';
?>
<style>
	.dt-container{
		font-size: 14px !important;
	}
</style>
<div class="d-sm-flex align-items-center justify-content-between mb-4">
	<h1 class="h3 mb-0 text-gray-800">SALES RECORD</h1>
</div>
<div class="row justify-content-center">
	<div class="col-md-12">
		<!-- <form class="form-inline">
			<div class="form-group">
				<input type="text" id="search" name="search" class="form-control" placeholder="Search by Product/IMEI/Serial">				
			</div>
			<div class="form-group">
			<button type="button" class="btn btn-success search-btn" id="search-btn" >SEARCH</button>
			</div>
		</form> -->
		<div class="card mt-2 mb-3">
			<div class="card-header">
				<button class="btn btn-primary float-right" id="export">Export to Excel</button>
			</div>
			<div class="card-body">
				<table class="table" id="record-table">
					<thead>
						<tr>
							<td>Product</td>
							<td>IMEI/Serial</td>
							<td>Memory</td>
							<td>Price</td>
							<td>Buyer</td>
							<td>Date Sold</td>
						</tr>
					</thead>
					<tbody class="record" id="record">

					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
<div style="display: none;">
	<table class="table" id="hidden-table">
		<thead>
			<tr>
				<td>Product</td>
				<td>IMEI/Serial</td>
				<td>Memory</td>
				<td>Price</td>
				<td>Buyer</td>
				<td>Date</td>
			</tr>
		</thead>
		<tbody class="" id="hidden">

		</tbody>
	</table>
</div>
<?php
require_once 'footer.php';
?>