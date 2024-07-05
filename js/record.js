$(document).ready(function () {
	zoomPage(0.85);
	getSales();
});
function zoomPage(zoomLevel) {
	document.body.style.zoom = zoomLevel;
}

// display sales table
function showSales(data) {
	$("#record", "#hidden").html("");
	for (index in data) {
		$("#record").append(
			`
			<tr>
				<td>` +
				data[index].product +
				`</td>
				<td>` +
				data[index].imei +
				`</td>
				<td>` +
				data[index].memory +
				`</td>
				<td>` +
				nairaConvert(parseInt(data[index].amount)) +
				`</td>
				<td>` +
				data[index].customer +
				`</td>
				<td>` +
				data[index].date_created +
				`</td>
			</tr>
		`
		);

		$("#hidden").append(
			`
			<tr>
				<td>` +
				data[index].product +
				`</td>
				<td>` +
				data[index].imei +
				`</td>
				<td>` +
				data[index].memory +
				`</td>
				<td>` +
				nairaConvert(parseInt(data[index].amount)) +
				`</td>
				<td>` +
				data[index].customer +
				`</td>
				<td>` +
				data[index].date_created +
				`</td>
			</tr>
		`
		);
	}

	var table = new DataTable("#record-table", {
		orderFixed: [5, "desc"],
	});
}

$("#search-btn").click(function (e) {
	e.preventDefault();
	let query = $("#search").val();

	if (query != "") {
		getSearch(query);
	}
});

$("#export").click(function () {
	let today = new Date();
	let date =
		today.getFullYear() +
		"-" +
		(today.getMonth() + 1) +
		"-" +
		today.getDate();
	let time =
		today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
	let dateTime = date + " " + time;
	exportExcel("xlsx", "Switch-Sales-Record", true, dateTime);
});

function exportExcel(type, fn, dl, dt) {
	var elt = document.getElementById("hidden-table");
	var wb = XLSX.utils.table_to_book(elt, { sheet: "sales record" });

	if (dl) {
		var wbout = XLSX.write(wb, {
			bookType: type,
			bookSST: true,
			type: "base64",
		});
		var dataUrl =
			"data:application/vnd.openxmlformats-officedocument.spreadsheetml.sheet;base64," +
			wbout;
		var link = document.createElement("a");
		link.href = dataUrl;
		link.download = fn + "_" + dt + "." + (type || "xlsx");
		link.click();
	} else {
		XLSX.writeFile(wb, fn + "_" + dt + "." + (type || "xlsx"));
	}
}
