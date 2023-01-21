$(document).ready(function(){
	getSales()
})

// display sales table
function showSales(data){
	$("#record").html("");
	for(index in data){
		$("#record").append(`
			<tr>
				<td>`+data[index].product+`</td>
				<td>`+data[index].imei+`</td>
				<td>`+data[index].memory+`</td>
				<td>`+nairaConvert(parseInt(data[index].amount))+`</td>
				<td>`+data[index].customer+`</td>
				<td>`+data[index].date_created+`</td>
			</tr>
		`)
	}
}

$("#search-btn").click(function(e){
	e.preventDefault();
	let query = $("#search").val();

	if(query != ""){
		getSearch(query);
	}
})