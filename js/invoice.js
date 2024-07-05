$(document).ready(function(){
sessionStorage.setItem("row", [0]);
getId();
$("#print").attr('disabled', 'disabled');
})

// add product
function addRow(){
	let rowArray = sessionStorage.getItem("row").split(',');
	row = Math.max.apply(Math, rowArray);
	row++;	
	$("#product-table").append(`
		<tr id="`+row+`">
			<td>
				<input type="text" class="form-control product-`+row+`" id="product-`+row+`" name="product-`+row+`" placeholder="Product">
			</td>
			<td>
				<input type="text" class="form-control imei-`+row+`" id="imei-`+row+`" name="imei-`+row+`" placeholder="IMEI/Serial">
			</td>
			<td>
				<input type="text" class="form-control color-`+row+`" id="color-`+row+`" name="color-`+row+`" placeholder="Color">
			</td>
			<td>
				<input type="text" class="form-control memory-`+row+`" id="memory-`+row+`" name="memory-`+row+`" placeholder="Memory">
			</td>
			<td>
				<input type="text" class="form-control price-`+row+`" id="price-`+row+`" name="price-`+row+`" placeholder="Price" oninput="total()">
			</td>
			<td>
				<button type="button" class="btn btn-danger cancel" id="cancel-`+row+`" value="`+row+`"><i class="fas fa-times"></i></button>
			</td>
		</tr>
		`)
	rowArray.push(row);
sessionStorage.setItem("row", rowArray);
}

// remove product
$(document).on('click', '.cancel',function(e){
	let id = $(this).val();
	if(id != "0"){
		$("#"+id).remove();
		let row = sessionStorage.getItem("row");
		row = row.split(',')
		let index = row.indexOf(id)
		row.splice(index, 1);
		
		sessionStorage.setItem('row', row);
	}
	total()
});


// calculate total price
function total(){
	let row = sessionStorage.getItem("row").split(',');

	let price = 0;

	for(index in row){
		if($("#price-"+row[index]).val() != ""){
			price += parseInt($("#price-"+row[index]).val());
		}

	}
	$("#total").html(nairaConvert(price))
	// console.log(price)
}


// save invoice
function save(){
	let row = sessionStorage.getItem("row").split(',');
	let product;
	let imei;
	let color;
	let memory;
	let price;
	let list;
	let lot = [];
	let invoice = $("#invoice-id").val();
	let name = $("#customer").val();
	let phone = $("#phone").val();
	let address = $("#address").val();
	let payment = $("#payment").val();

	for(index in row){
		if($("#product-"+row[index]).val() != "" || $("#price-"+row[index]).val() != ""){		
			list = {
				product: $("#product-"+row[index]).val(),
				imei: $("#imei-"+row[index]).val(),
				color: $("#color-"+row[index]).val(),
				memory: $("#memory-"+row[index]).val(),
				price: $("#price-"+row[index]).val()
			}
			lot.push(list);
		}
	}
	if(lot.length < 1){
		alert_failure("Invoice is empty!");
	}
	else{
		saveInvoice(invoice, name, phone, address, payment, lot);
	}
}

// print inoice
function printInvoice(){

	alert_warning("Loading...");
	let row = sessionStorage.getItem("row").split(',');
	let name = $("#customer").val();
	let phone = $("#phone").val();
	let address = $("#address").val();
	let payment = $("#payment").val();
	let product;
	let imei;
	let color;
	let memory;
	let price;
	let total = 0;

	$("#customer-name").html(name);
	$("#customer-address").html(address);
	$("#customer-phone").html(phone);
	$("#payment-type").html(payment)

	$(".date").html(getDate());
	$(".invoiceID").html($("#invoice-id").val())

	$("#product-list").html("");
	for(index in row){
		product = $("#product-"+row[index]).val();
		imei = $("#imei-"+row[index]).val();
		color = $("#color-"+row[index]).val();
		memory = $("#memory-"+row[index]).val();
		price = $("#price-"+row[index]).val();
		if($("#product-"+row[index]).val() != "" || $("#price-"+row[index]).val() != ""){
			$("#product-list").append(`
				<div class="mt-3 mb-3 product-box">
					<p>Product: `+product.toUpperCase()+`</p>
					<p>IMEI/Serial: `+imei.toUpperCase()+`</p>
					<p>Colour: `+color.toUpperCase()+`</p>
					<p>Memory: `+memory.toUpperCase()+`</p>
					<p>Price: `+nairaConvert(price)+`</p>
				</div>
			`);
			total += parseInt(price);

		}
	}
	$(".prnt-total").html(nairaConvert(total));
	$(".words").html(numToWords(total).toUpperCase()+" NAIRA")

	setTimeout(function(){
		window.print();
	},5000)
}