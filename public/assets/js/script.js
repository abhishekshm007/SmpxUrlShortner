/**
 * 
 */
var aaData = [];
var from = 1;
var to = 10;


function setData(data){
	for (i in data) {
		aaData.push([data[i].id, data[i].long_url, data[i].short_url, data[i].created_at, data[i].is_active, data[i].clicks, data[i].clicks])
	}
	$("#dataTable").dataTable({
		"aaData": aaData,
		"bJQueryUI": true,
		"aoColumns": [{
			"sTitle": "No.",
			"sWidth": "10px"
		}, {
			"sTitle": "Long",
			"sWidth": "200px"
		}, {
			"sTitle": "Short",
			"sWidth": "200px"
		}, {
			"sTitle": "Created",
			"sWidth": "200px"
		}, {
			"sTitle": "Active",
			"sWidth": "1px"
		}, {
			"sTitle": "Clicks",
			"sWidth": "10px"
		}, {
			"sTitle": "Analytics",
			"sWidth": "10px"
		}]

	});
}

$('#submit').click(function() {
	$.ajax({
		type: "POST",
		url: "http://localhost:8000/urls",
		data: {short_url:"asdf",long_url:"asjdf"},
		success: function(msg) {
			alert("Form Submitted: " + msg);
		}
	});

});

	
$.get("http://localhost:8000/urls", function(res, status){
	var data = JSON.parse(res);
	setData(data.data);
});
