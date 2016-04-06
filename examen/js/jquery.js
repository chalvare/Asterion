$(document).ready(function() {
				$('#ralentizar').hide();
	            setTimeout(function(){
					 $envio=$('#volverAAsignaturas').find('input[type=submit]');
					 $envio.click();
				}, 3000);
			});
			
			
			
			var porcentaje =0;
			var status;
			 $(document).ready(function(){
				
				status = setInterval(function(){
					porcentaje=porcentaje + 10;
					$('#progreso').css("width",porcentaje+"%");
					if(porcentaje==100) {
						clearInterval(status);
						$('#ralentizar').show();
					}
				}, 100);
				
			});