var databases = undefined;
var tables = undefined;

$(function(){
	$(".section:not(.section:first)").hide();
});

function createDatatable(table){
	
}

function test(){
	$("#connection button").attr("disabled","disabled");
	var server = $("#connection_server").val();
	var port = $("#connection_port").val();
	var user = $("#connection_user").val();
	var pass = $("#connection_pass").val();
	$.ajax({
		url: "/starter/controller/test",
		type: "POST",
		data: "server="+server+"&port="+port+"&user="+user+"&pass="+pass,
		success: function(data){
			alert(data);
			$("#connection button").removeAttr("disabled");
		},
		error: function(){
			alert("Connection Failed!");
			$("#connection button").removeAttr("disabled");
		}
	});
}

function connect(){
	$("#connection button").attr("disabled","disabled");
	var server = $("#connection_server").val();
	var port = $("#connection_port").val();
	var user = $("#connection_user").val();
	var pass = $("#connection_pass").val();
	$.ajax({
		url: "/starter/controller/connect",
		type: "POST",
		data: "server="+server+"&port="+port+"&user="+user+"&pass="+pass,
		success: function(data){
			if(databases != undefined){ databases.fnDestroy(); databases = undefined;}
			$("#databases table tbody").html(data);
			databases = $("#databases table").dataTable({
				"bJQueryUI": true,
				"bLengthChange": false,
				"bPaginate": false,
				"bFilter": false
			});
			$("#databases table").css("width","100%");
			$("#databases").show();
			$("#connection button").removeAttr("disabled");
		},
		error: function(){
			alert("Connection Failed!");
			$("#connection button").removeAttr("disabled");
		}
	});
}

function use(database){
	$("#databases button").attr("disabled","disabled");
	var server = $("#connection_server").val();
	var port = $("#connection_port").val();
	var user = $("#connection_user").val();
	var pass = $("#connection_pass").val();
	$.ajax({
		url: "/starter/controller/use_db",
		type: "POST",
		data: "server="+server+"&port="+port+"&user="+user+"&pass="+pass+"&database="+database,
		success: function(data){
			if(tables != undefined){ tables.fnDestroy(); tables = undefined;}
			$("#tables table tbody").html(data);
			$("#tables table thead tr:first th:first").html("Tables of "+database);
			tables = $("#tables table").dataTable({
				"bJQueryUI": true,
				"bLengthChange": false,
				"bPaginate": false,
				"bFilter": false
			});
			$("#tables table").css("width","100%");
			$("#tables").show();
			$("#databases button").removeAttr("disabled");
		},
		error: function(){
			alert("Connection Failed!");
			$("#databases button").removeAttr("disabled");
		}
	});
}