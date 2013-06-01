<?php
include ('../conexion.php');
$cadetes=mysql_query("SELECT * FROM cadete");
?>


<html>
<head> 
<meta charset="utf-8"> 
<link href="../twitter-bootstrap-v2/docs/assets/css/bootstrap.css" rel="stylesheet">
</head>

<form class="form-horizontal"  method='post' action='Borrarcadete.php'>

<fieldset>
		<legend>Borrar Cadete </legend>

<div class="control-group">
				<label class="control-label" for="cadete1"> Cadete :  </label>
 					<div class="controls">

<select id="cadete1"name='cadete'>

	<?php
	while($row=mysql_fetch_array($cadetes))
echo "<option value ='$row[0]'>$row[0]</option>";
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

	$query1="DELETE FROM JEFExCadete WHERE cadete='$cadete' "; 

	if (mysql_query($query1)){
echo " Se han borrado los hijos";
		

	$query="DELETE FROM cadete WHERE infante_de_marina='$cadete'";
	if (mysql_query($query)) {
        echo "<br/>Las datos del cadete se han borrado correctamente ";
    	} else {
        	echo "<br/>Se ha producido un error con la consulta: $query";
    	}

	}else {
		" No se borraron los Hijos ni tampoco el oficial"; 
	}

}

?>