$(document).ready(function() {                 
    $("#c_name").submit(function(e){
		  e.preventDefault();
		  alert($("#text_email").val());
		  $.ajax({
			url:'check.php',
			type:'POST',
			data: {email:$("#text_email").val(), contra:$("#text_clave").val()},
			success: function(resp) {
			   if(resp == "invalid") {
					alert("Error"); 
			   } else {
					window.location.href= resp;
			   }
			}
		 });
	});
});