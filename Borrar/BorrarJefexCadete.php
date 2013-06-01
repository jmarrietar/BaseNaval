<?php
include ('../conexion.php');
$JefexCadetes=mysql_query("SELECT * FROM JefexCadete");
?>

<html>
<head> 
<meta charset="utf-8"> 
<link href="../twitter-bootstrap-v2/docs/assets/css/bootstrap.css" rel="stylesheet">
</head>

<form class="form-horizontal" method='post' action='BorrarJefexCadete.php'>
	<fieldset>
		<legend>Borrar JefexCadetes </legend>

		<div class="control-group">
				<label class="control-label" for="JefexCadete1"> JefexCadete :  </label>
 					<div class="controls">


<select id="JefexCadete1" name='JefexCadete'>

	<?php
	while($row=mysql_fetch_array($JefexCadetes))
echo "<option value ='$row[0]'>$row[1]-$row[2]-$row[3]-$row[4]</option>";
	?>


	</select>

	</div>
		</div>


<div class="form-actions">
 	
 		<button type="submit" class="btn btn-primary " name='borrar' value='Borrar'>Borrar</button>
 		
</form>
<br/> <a href='index.php'>volver</a>
</html>


<?php 
if (isset($_POST['borrar'])){
	extract($_POST); 

	$query="DELETE FROM JefexCadete WHERE consecutivo='$JefexCadete' ";

	if (mysql_query($query)){
echo "<br/>Las datos del JefexCadete se han borrado correctamente ";
	} else {
        	echo "<br/>Se ha producido un error con la consulta: $query";
    	}
}
?>