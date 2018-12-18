$(document).ready(function(){
	GetAllAtividades();
});

function GetAllAtividades(){
	$URL =  "API/public/"	
	  $.ajax({
	  method: "GET",
	  url: $URL + "atividade",
	  dataType: "text",
	  success: function(data) {
	  	console.log(data);
	  }	
	}

	);
}