<?php
include('../conexion.php');
$cadetes=mysql_query("SELECT * FROM cadete"); //Aqui se podria hacer un JOIN. con infante de marina.. Nombre.
$oficiales=mysql_query("SELECT * FROM oficial");   
?>

<!DOCTYPE html> 
<html > 
<head> 
<meta charset="utf-8"> 

<link href="../twitter-bootstrap-v2/docs/assets/css/bootstrap.css" rel="stylesheet">
</head>

<form class="form-horizontal" method='post' action ='JefeOficial.php'>
	<fieldset>
		<legend>Asignacion Jefe Oficial a Cadete </legend>

		<div class="control-group">
 			<label class="control-label" for="cadete2"> Cadete  :  </label>
 				<div class="controls">

<select id="cadete2"name='cadete'>

	<?php
		while($row=mysql_fetch_array($cadetes)){

echo "<option value='$row[0]'> $row[0]-$row[1]</option>";

		}
	?>

</select>

		</div>
		</div>


<div class="control-group">
				<label class="control-label" for="oficial2"> Oficial  :  </label>
 					<div class="controls">

<select id="oficial2" name='oficial'>

	<?php
		while($row=mysql_fetch_array($oficiales)){
echo "<option value='$row[0]'> $row[0]-$row[1]</option>";
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
<br/>
<a href='index.php'>volver</a>

</html>

<?php
if (isset($_POST['registrar'])){
	extract($_POST);
$query="INSERT INTO jefexcadete (cadete,suboficial,oficial,fecha_inicio,fecha_fin)  VALUES ('$cadete',null,'$oficial','$fecha_inicio','$fecha_fin')";

if (mysql_query($query)){
	echo "</br>El  jefe se asigno correctamente"; 

}else {
	echo "<br/>Se ha producido un error con la consulta: $query";
    }
}



?>




