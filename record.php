<?php
$title = "Record";
require_once 'header.php';
?>
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">SALES RECORD</h1>
</div>
<div class="row justify-content-center">
	<div class="col-md-12">
		<form class="form-inline">
			<div class="form-group">
				<input type="text" id="search" name="search" class="form-control" placeholder="IMEI/Serial">				
			</div>
			<div class="form-group">
			<button type="button" class="btn btn-success search-btn" id="search-btn" >SEARCH</button>
			</div>
		</form>
		<hr>
		<table class="table">
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
			<tbody class="record" id="record">
				
			</tbody>
		</table>
	</div>
</div>
<?php 
require_once 'footer.php';
?>