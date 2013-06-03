<?php
include('../conexion.php');
?>

<!DOCTYPE html> 
<html > 
<head> 

<meta charset="utf-8"> 
<script>

function validarmodulo() {
    var codigo = document.getElementById("codigo1").value;
    var email = document.getElementById("correo1").value;
    var nombre = document.getElementById("nombre1").value;
	var re  = /^([a-zA-Z0-9_.-])+@(([a-zA-Z0-9-])+.)+([a-zA-Z0-9]{2,4})+$/; 
	


   
    if(nombre==""){
		
	return alert("Debe ingresar un nombre");
	
	} else if(!isNaN(nombre) ){
		alert("El nombre no puede ser numérico");
	} 
	
	 if(codigo==""){
		
	return alert("Debe ingresar un codigo");
	
	
	}
	
	if(email==""){
	alert("ingresa un correo electronico"); 
	}
	
	if(isNaN(codigo) ){
		alert("El código ingresado debe ser numérico");
	}
	
	if (!re.test(email)) { 
    alert ("La dirección de correo parece no ser válida"); 
	}
	
	
	
	document.getElementById("uts").click();

}



</script>
<link href="../twitter-bootstrap-v2/docs/assets/css/bootstrap.css" rel="stylesheet">
</head>


<body>
<form class="form-horizontal" id="registraInfantedeMarina" method='get' action ='registrarInfantedeMarina.php'  >
	
  
    <fieldset>
	
    
    
    
    	<legend>Registro de Infantes</legend>
		<div class="control-group">
		  <label class="control-label" for="codigo1">Codigo :</label>
		    <div class="controls">
				<input type='text' id ="codigo1" name='codigo'  required  /><br/>
					  <p class="help-block">Por favor Ingresa un código valido (Solo Números). </p>
                      
                      
			</div>
            
      
            
		</div>


		 <label class="control-label" for="optionsCheckbox">Nombre</label>
		 	<div class="controls">
		 		<input type='text' id="nombre1" name='nombre' /><br/>
					<p class="help-block">Por favor Ingrese un Nombre  valido (Solo Letras). </p>

				</div>
		</div>
	</br>

		 <div class="control-group">
	 
	 		 <label class="control-label" for="correo1">Correo electronico:</label>
	 		   	<div class="controls">
	 				<input type='text' id="correo1"name='correo' required/><br/>
	 					 <p class="help-block">(ejemplo 123@hotmail.com). </p>


				</div>
		</div>

 <div class="control-group">
 	<label class="control-label" for="tipo1">Tipo:</label>
 	<div class="controls">
	 <select id="tipo1" name='tipo'><br/>
			<option value=1 >1 </option>
			<option value=2 >2 </option>
			<option value=3 >3 </option>
			</select><br/>
			    </div>
          </div>

       <div class="form-actions">
       	
        
        <input type="button"  onclick="validarmodulo()" value='Registrar' class="btn btn-primary ">
        <button type="submit"    id="uts" name='registrar' value='Registrar' style="color: transparent; background-color: transparent; border-color: transparent;" > </button>
        	
       
        


</form> 
</body>
</html>



<br/><a href='index.php'>volver</a>


<?php 


if (isset($_GET['registrar'])){
	$codigo=$_GET['codigo']; 
	$nombre=$_GET['nombre'];
	$correo=$_GET['correo'];
	$tipo=$_GET['tipo'];  //REVISAR ESTA PARTE
if (is_numeric($codigo) &&  preg_match ("/^[A-Za-z][A-Za-z -]*[A-Za-z]$/", $nombre) && filter_var($correo, FILTER_VALIDATE_EMAIL)  ) {
   
   $query="INSERT INTO infante_de_marina VALUES ('$codigo','$nombre',$tipo,'$correo')";
if (mysql_query($query)){
	echo "<br/> Infante de Marina registrado correctamente!."; 
}else {
	echo "<br/> Se ha producido un error en la consulta :$query"; 
	
}
    }else {
        echo "</br>Datos no se guardaron, datos no correctos";
    }


}


?>