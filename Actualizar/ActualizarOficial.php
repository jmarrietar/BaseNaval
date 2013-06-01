<?php
include ('../conexion.php');
$oficiales=mysql_query("SELECT * FROM oficial");
?>


<html>
<head> 
<meta charset="utf-8"> 
<link href="../twitter-bootstrap-v2/docs/assets/css/bootstrap.css" rel="stylesheet">
</head>

<form class="form-horizontal" method='post' action='ActualizarOficial.php'>
	<fieldset>
		<legend>Actualizar Oficiales </legend>

<div class="control-group">
				<label class="control-label" for="oficial1"> Oficial  :  </label>
 					<div class="controls">

<select name='oficial'>

	<?php
	while($row=mysql_fetch_array($oficiales))
echo "<option value='$row[0]'>$row[0]-$row[1]</option>";
	?>

</select>
</div>
		</div>

<div class="control-group">
 			<label class="control-label" for="arma1"> Arma:  :  </label>
 				<div class="controls">

 <select id="arma1"name='arma'><br/>
<option value='Superficie'>Superficie</option>
<option value='Ingenieria'>Ingenieria</option>
<option value='Oceanografia'>Oceanografia</option>
<option value='Logistica'>Logistica'</option>

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
	$query="UPDATE oficial SET arma ='$arma' WHERE infante_de_marina='$oficial' ";
if (mysql_query($query)) {
        echo "<br/>Las actualizaciones del oficial se registraron correctamente ";
    } else {
        echo "<br/>Se ha producido un error con la consulta: $query";
    }
}

?>