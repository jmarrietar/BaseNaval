<?php
include ('../conexion.php');
$suboficiales=mysql_query("SELECT * FROM suboficial");
?>

<html>
<head> 
<meta charset="utf-8"> 
<link href="../twitter-bootstrap-v2/docs/assets/css/bootstrap.css" rel="stylesheet">
</head>



<form class="form-horizontal" method='post' action='ActualizarSuboficial.php'>
		<fieldset>
		<legend>Actualizar Suboficiales </legend>

<div class="control-group">
				<label class="control-label" for="oficial1"> Suboficial  :  </label>
 					<div class="controls">

<select name='suboficial'>

	<?php
	while($row=mysql_fetch_array($suboficiales))
echo "<option value='$row[0]'>$row[0]-$row[1]</option>";
	?>

</select>
</div>
		</div>

		<div class="control-group">
 			<label class="control-label" for="arma1"> Asignacion:  </label>
 				<div class="controls">

 <select name='asignacion'></br>
<option value='sublogistico'>sublogistico</option>
<option value='instructor'>instructor</option>
<option value='operativo'>operativo</option>

</select>

</div>
		</div>

<div class="form-actions">
 	
 		<button type="submit" class="btn btn-primary " name='actualizar' value='Actualizar'>Actualizar</button>
</form>

<br/> <a href='index.php'>volver</a>

</html>


<?php 
if (isset($_POST['actualizar'])){
	extract($_POST); 
	$query="UPDATE suboficial SET asignacion ='$asignacion' WHERE infante_de_marina='$suboficial' ";
if (mysql_query($query)) {
        echo "<br/>Las actualizaciones del suboficial se registraron correctamente ";
    } else {
        echo "<br/>Se ha producido un error con la consulta: $query";
    }
}

?>

