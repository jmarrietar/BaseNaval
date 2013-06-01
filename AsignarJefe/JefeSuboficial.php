<?php
include ('../conexion.php');
$cadetes=mysql_query("SELECT * FROM cadete");
$suboficiales=mysql_query("SELECT * FROM suboficial");
?>


<!DOCTYPE html> 
<html > 
<head> 
<meta charset="utf-8"> 

<link href="../twitter-bootstrap-v2/docs/assets/css/bootstrap.css" rel="stylesheet">
</head>

<form class="form-horizontal"  method='post' action='JefeSuboficial.php'>
		<fieldset>
		<legend>Asignacion Jefe Subficial a Cadete </legend>

	<div class="control-group">
 			<label class="control-label" for="cadete2"> Cadete  :  </label>
 				<div class="controls">
  
<select name='cadete'>
<?php

	while ($row=mysql_fetch_array($cadetes)){
echo "<option value='$row[0]'> $row[0]-$row[1]</option>";

	}
?>

</select>
</div>
		</div>

<div class="control-group">
				<label class="control-label" for="suboficial2"> Subficial  :  </label>
 					<div class="controls">

<select id="suboficial2" name='suboficial'>

<?php
	while ($row=mysql_fetch_array($suboficiales)){
		echo"<option value='$row[0]'>$row[0]</option>";  

	}

?>

</select>

</div>
		</div>

		<div class="control-group">
 			<label class="control-label" for="fecha1"> Fecha de Inicio  :  </label>
 				<div class="controls">

 <input id="fecha1"type='date' name='fecha_inicio' required><br/>
	</div>
		</div>

			<div class="control-group">
 			<label class="control-label" for="fecha2"> Fecha de Fin :  </label>
 				<div class="controls">

<input id="fecha2"type='date' name='fecha_fin'><br/> 

</div>
		</div>


<div class="form-actions">
 		<button type="submit" class="btn btn-primary " name='registrar' value='Registrar'>Registrar</button>


</form>
</br>
</br>
<a href='index.php'>Volver</a>

</html>


<?php
if (isset($_POST['registrar'])){
	extract($_POST);

$query="INSERT INTO jefexcadete (cadete,suboficial,oficial,fecha_inicio,fecha_fin) VALUES ('$cadete','$suboficial',null,'$fecha_inicio','$fecha_fin')";

if(mysql_query($query)){
	echo"</br> El jefe se asigno correctamente";
}else {
	echo "<br/> Se ha producido un error en la consulta $query";
}

}
?>