function getSales(){
	$.ajax({
		type: 'GET',
		url: 'backend/record.php?sales'
	})
	.done(function(res){
		let data = JSON.parse(res);
		console.log(data)
		if(data.status == "success"){			
		showSales(data.data);
		}
	})
}

function getSearch(query) {
		$.ajax({
		type: 'GET',
		url: 'backend/record.php?search='+query
	})
	.done(function(res){
		let data = JSON.parse(res);
		console.log(data)
		if(data.status == "success"){			
		showSales(data.data);
		}
	})
}