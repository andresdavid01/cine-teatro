<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="amartinez" >
    <link rel="shortcut icon" href="favicon.png">

    <title>Gestion de Actividades</title>

    <link rel="stylesheet" type="text/css" href="dist/css/dt/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="dist/css/dt/DT_bootstrap.css">
	 
    <script type="text/javascript" charset="utf-8" language="javascript" src="dist/js/dt/jquery.js"></script>
    <script type="text/javascript" charset="utf-8" language="javascript" src="dist/js/dt/jquery.dataTables.js"></script>
    <script type="text/javascript" charset="utf-8" language="javascript" src="dist/js/dt/DT_bootstrap.js"></script>
    <script src="dist/js/bootstrap.min.js"></script>
    <script src="dist/js/bootbox.js"></script>	 
	 
    <script type="text/javascript">
      function elimina(id_zona_teatro){
			$.ajax({
			    type: "POST",
			    url: "controllers/eZona_teatro.php",
			    data: "id_zona_teatro="+id_zona_teatro,
			    success: function(html){
			    if(html=='1'){
			    	bootbox.alert("Fue eliminado correctamente", function() {
                		document.location="iTeatro.php";
                	        });
			    }
			    else{
			    	bootbox.alert("No fue eliminado, verifique", function() {
	               });
					 }
			    },
			    beforeSend:function(){
				 	$("#add_err").html("Loading...")
			    }
			});
    	}
    	
	function edit(id_zona_teatro, nombre_zona_teatro, descripcion_zona_teatro){
		document.getElementById("id_zona_teatro").value=id_zona_teatro;
		document.getElementById("nombre_zona_teatro").value=nombre_zona_teatro;
		document.getElementById("descripcion_zona_teatro").value=descripcion_zona_teatro;
    	}
    	
	   $(document).ready(function(){
alert("aqui");
		$("#ingresar").click(function(){ 
			id_zona_teatro=$("#id_zona_teatro").val();
			nombre_zona_teatro=$("#nombre_zona_teatro").val();
			descripcion_zona_teatro=$("#descripcion_zona_teatro").val();

			 $.ajax({
			    type: "POST",
			    url: "controllers/iZona_teatro.php",
			    data: "id_zona_teatro="+id_zona_teatro+"&nombre_zona_teatro="+nombre_zona_teatro+"&descripcion_zona_teatro="+descripcion_zona_teatro,
			    success: function(html){ alert(html+"info");
			    if(html=='1'){
			    	bootbox.alert("Fue registrado correctamente", function() {
				document.location="iZona_teatro.php";
				});
			    }
			    else{
				if(html=='2'){
				    	bootbox.alert("El registro fue modificado con éxito", function() {
				    	document.location="iZona_teatro.php";
		        	 	});
				 }
				 else{
					if(html=='-1'){
				    		bootbox.alert("No fue procesado, verifique, lio en el SQL", function() {
		        	 	});
			         	}
					else{
						bootbox.alert("No se que ptas paso", function() {
				       		});
				 	}
				 }
			    }
			    },
			    beforeSend:function(){
				 	$("#add_err").html("Loading...");
			    }
			});
			return false;
		   });
		});
  </script>
  
  </head>

  <body>
  <form class="form-horizontal" role="form">
  <h3>Actividades</h3>
  <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Código</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="id_zona_teatro" placeholder="Código de la zona_teatro" required />
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Nombre</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="nombre_zona_teatro" placeholder="Nombre de la zona_teatro" required />
    </div>
  </div>
  <div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label">Descripción</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="descripcion_zona_teatro" placeholder="Descripción de la zona_teatro" required />
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button id="ingresar" type="submit" class="btn">Guardar</button>
    </div>
  </div>
</form>
<?php
	ini_set('display_errors', 'on');
	include_once("models/class.zona_teatro.php");
	$obj = new zona_teatro;
	$obj->getTabla();
?>
  </body>
</html>
