<?php
include('../conexion.php');
$suboficiales=mysql_query("SELECT * FROM infante_de_marina WHERE tipo =2");
?>

<html>
<head> 
<meta charset="utf-8"> 

<link href="../twitter-bootstrap-v2/docs/assets/css/bootstrap.css" rel="stylesheet">
</head>

<form class="form-horizontal" id ='registrarSuboficial' method='post' action='registrarSuboficial.php'>

<fieldset>
		<legend>Registro de Suboficiales</legend>

		<div class="control-group">
				<label class="control-label" for="oficial1"> Suboficial :  </label>
 					<div class="controls">

<select id="suboficial1" name='suboficial'>

<?php
	while($row=mysql_fetch_array($suboficiales)){
		echo "<option value='$row[0]'> $row[0] - $row[1]</option>";
	}

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
 		<button type="submit" class="btn btn-primary " name='registrar' value='Registrar'>Registrar</button>

</form>

</select></br>
<br/><a href='index.php'> Volver</a>
</html>

<?php
if (isset($_POST['registrar'])){
	extract($_POST);
	$query="INSERT INTO suboficial VALUES ('$suboficial','$asignacion')";

	if(mysql_query($query)){
		echo "<br/>Las especificaciones del suboficial se registraron correctamente";

	}else {
		echo "<br/> Se ha producido un error en la consulta: $query";
	}

}
?>