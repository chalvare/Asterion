	$('#myfile').change(function(){
			$('#path').val($(this).val());
		});
	
	$(document).ready(function(){
		$("#tablaMejoras").on('click','#botonComprar',function() {
	    var borrarTr = $(this).closest("tr");
	    borrarTr.remove();      
		});
	});