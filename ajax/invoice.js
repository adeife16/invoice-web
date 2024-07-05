function getId(){
	$.ajax({
		type: 'GET',
		url: 'backend/invoice.php?getid'
	})
	.done(function(res){
		let data = JSON.parse(res);
		data++;
		let invoice;
		if(data < 9){
			invoice = "SW-0000"+data;
		}
		else if(data < 99){
			invoice = "SW-000"+data;
		}
		else if(data < 999){
			invoice = "SW-00"+data;
		}
		else if(data < 9999){
			invoice = "SW-0"+data;
		}
		else if(data < 99999){
			invoice = "SW-"+data;
		}

		$("#invoice-id").val(invoice);
	})
}


function saveInvoice(invoice, name, phone, address, payment, lot){
	$.ajax({
		type: 'POST',
		url: 'backend/invoice.php',
		data:{
			save: invoice,
			name: name,
			phone: phone,
			address: address,
			payment: payment,
			lot: lot
		}
	})
	.done(function(res){
		if(res == "success"){
			alert_success('Record Saved Successfully!');
			$("#save").attr("disabled", "disabled");
			$("#print").removeAttr("disabled");
		}
	})
}