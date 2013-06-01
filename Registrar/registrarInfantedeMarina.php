<?php
include('../conexion.php');
?>

<!DOCTYPE html> 
<html > 
<head> 
<meta charset="utf-8"> 

<link href="../twitter-bootstrap-v2/docs/assets/css/bootstrap.css" rel="stylesheet">
</head>
<form class="form-horizontal" id="registraInfantedeMarina" method='get' action ='registrarInfantedeMarina.php'  >
	<fieldset>
		<legend>Registro de Infantes</legend>
		<div class="control-group">
		  <label class="control-label" for="codigo1">Codigo :</label>
		    <div class="controls">
				<input type='text' id ="codigo1" name='codigo' required/><br/>
					  <p class="help-block">Por favor Ingresa un código valido (Solo Números). </p>
			</div>
		</div>


		 <label class="control-label" for="optionsCheckbox">Nombre</label>
		 	<div class="controls">
		 		<input type='text' id="nombre1" name='nombre' required/><br/>
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
       	<button type="submit" class="btn btn-primary " name='registrar' value='Registrar'>Registrar</button>


</form> 


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