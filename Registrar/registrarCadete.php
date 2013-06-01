<?php
include ('../conexion.php'); 
$cadetes=mysql_query("SELECT * FROM infante_de_marina WHERE tipo=3 "); 
?> 

<html>
<head> 
<meta charset="utf-8"> 

<link href="../twitter-bootstrap-v2/docs/assets/css/bootstrap.css" rel="stylesheet">
</head>
<form class="form-horizontal" id ="registrarCadete" method='post' action ='registrarCadete.php'>

	<fieldset>
		<legend>Registro de Cadetes</legend>
		<div class="control-group">
 			<label class="control-label" for="cadete1"> Cadete  :  </label>
 				<div class="controls">

 					<select id="cadete1"name='cadete'>
	
	<?php 
	while ($row =mysql_fetch_array ($cadetes) ) {
	echo "<option value ='$row[0]' > $row[0]- $row[1]</option>";
	
	}
	?>

</select>

 				</div>
		</div>

 <div class="control-group">
 	 <label class="control-label" for="codigo1">Anio : </label>
 	 <div class="controls">
 		<input type='text' name='anio' value="

<?php 

if(isset($_POST['anio']))
echo $_POST['anio'];
?>
" required><br/>
  <p class="help-block">Por favor Ingresa un Año valido (1,2 o 3 ). </p>


	</div>
		</div>


 <div class="form-actions">
 		<button type="submit" class="btn btn-primary " name='registrar' value='Registrar'>Registrar</button>

</form>

<br/> <a href='index.php'>volver</a>

</html> 

<?php 
if (isset($_POST['registrar'])){
	extract($_POST); 

	if ($anio==1 or $anio==2 or $anio==3 ){

	$query="INSERT INTO cadete VALUES ('$cadete','$anio')";
if (mysql_query($query)) {
        echo "<br/>Las especificaciones del cadete se registraron correctamente ";
    } else {
        echo "<br/>Se ha producido un error con la consulta: $query";
    }

}else {
	echo "<br>Numero no se encuentra entre valores {1,2,3}.";

}

}

?>











