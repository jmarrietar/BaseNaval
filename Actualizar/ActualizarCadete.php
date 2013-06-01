<?php
include ('../conexion.php');
$cadetes=mysql_query("SELECT * FROM cadete");
?>

<html>
<head> 
<meta charset="utf-8"> 

<link href="../twitter-bootstrap-v2/docs/assets/css/bootstrap.css" rel="stylesheet">
</head>

<form class="form-horizontal" method='post' action='ActualizarCadete.php'>

<fieldset>
		<legend>Actualizar Cadetes</legend>
		<div class="control-group">
 			<label class="control-label" for="cadete1"> Cadete  :  </label>
 				<div class="controls">

<select name='cadete'>

	<?php
	while($row=mysql_fetch_array($cadetes))
echo "<option value='$row[0]'>$row[0]-$row[1]</option>";
	?>

</select>
		</div>
		</div>


 <div class="control-group">
 	 <label class="control-label" for="codigo1">Anio : </label>
 	 <div class="controls">

 <input type='text' name='anio' required><br/>
 <p class="help-block">Por favor Ingresa un Año valido (1,2 o 3 ). </p>

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


if ($anio==1 or $anio==2 or $anio==3 ){

	$query="UPDATE cadete SET anio ='$anio' WHERE infante_de_marina='$cadete' ";
if (mysql_query($query)) {
        echo "<br/>Las actualizaciones del cadete se registraron correctamente ";
    } else {
        echo "<br/>Se ha producido un error con la consulta: $query";
    }

}else {
	echo "<br>Numero no se encuentra entre valores {1,2,3}.";

}



}

?>