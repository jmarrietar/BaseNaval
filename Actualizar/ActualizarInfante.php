<?php 
include('../conexion.php'); 
$infantes=mysql_query("SELECT * FROM infante_de_marina");
?>

<!DOCTYPE html> 
<html > 
<head> 
<meta charset="utf-8"> 

<link href="../twitter-bootstrap-v2/docs/assets/css/bootstrap.css" rel="stylesheet">
</head>

<form class="form-horizontal" method='post' action ='ActualizarInfante.php'>
	<fieldset>
		<legend>Actualizar  Infantes</legend>

<div class="control-group">
				<label class="control-label" for="oficial1"> Infante :  </label>
 					<div class="controls">

<select name='infante'>

<?php
	while ($row=mysql_fetch_array($infantes))
		echo "<option value='$row[0]'>$row[0]-$row[1]</option>"; 

?>
</select>
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

	
<div class="form-actions">
 		<button type="submit" class="btn btn-primary " name='actualizar' value='Actualizar'>Actualizar</button>

</form> 

</br>
<br/> <a href='index.php'>volver</a>
</html>


<?php 
if (isset($_POST['actualizar'])){
	
	extract($_POST); 

if (preg_match ("/^[A-Za-z][A-Za-z -]*[A-Za-z]$/", $nombre) && filter_var($correo, FILTER_VALIDATE_EMAIL) ) {

$query="UPDATE infante_de_marina
	  SET nombre ='$nombre',correo_electronico='$correo'  
	  WHERE codigo='$infante' ";
if (mysql_query($query)) {
        echo "<br/>Las actualizaciones del Infante se registraron correctamente ";
    } else {
        echo "<br/>Se ha producido un error con la consulta: $query";
    }

} else {
	 echo "Datos no se guardaron, datos no correctos";
}


}
	


?>