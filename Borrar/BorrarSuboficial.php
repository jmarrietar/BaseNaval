<?php
include ('../conexion.php');
$suboficiales=mysql_query("SELECT * FROM suboficial");
?>

<html>
<head> 
<meta charset="utf-8"> 
<link href="../twitter-bootstrap-v2/docs/assets/css/bootstrap.css" rel="stylesheet">
</head>

<form class="form-horizontal"  method='post' action='BorrarSuboficial.php'>

		<fieldset>
		<legend>Borrar Suboficiales </legend>

<div class="control-group">
				<label class="control-label" for="suboficial1"> Suboficial  :  </label>
 					<div class="controls">

<select id="suboficial1" name='suboficial'>


	<?php
	while($row=mysql_fetch_array($suboficiales))
echo "<option value ='$row[0]'>$row[0]</option>";
	?>

</select>
</div>
		</div>

<div class="form-actions">
 	
 		<button type="submit" class="btn btn-primary " name='borrar' value='Borrar'>Borrar</button>
</form>
<br/>
<br/> <a href='index.php'>volver</a>
</html>


<?php 
if (isset($_POST['borrar'])){
	extract($_POST); 
$query2="DELETE FROM JEFExCadete WHERE suboficial='$suboficial'"; 

if (mysql_query($query2)){
	echo "Se han borrado los hijos"; 

		$query="DELETE FROM suboficial WHERE infante_de_marina='$suboficial'";
if (mysql_query($query)) {
        echo "<br/>Las datos del suboficial se han borrado correctamente ";
    } else {
        echo "<br/>Se ha producido un error con la consulta: $query";
    }


} else {
	echo "No se han borrado los hijos Ni tampoco el Suboficial."; 
}

}

?>