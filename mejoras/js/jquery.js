$(document).ready(function(){
		$("#tablaMejoras").on('click','#botonComprar',function() {
	    var borrarTr = $(this).closest("tr");
	    borrarTr.remove();      
		});
	});
	
	$(document).ready(function(){
		$('formMejoras').on('click',function(){
			var valor = $('#prueba').val();
			alert(valor);
		});
	});
	
	
	$(document).ready(function(){
		window.setTimeout(function() { 
			$(".alert-success").alert('close'); 
			}, 2000);
	});
