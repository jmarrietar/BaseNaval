<?php
include ('../conexion.php');
$oficiales=mysql_query("SELECT * FROM oficial");
?>

<html>
<head> 
<meta charset="utf-8"> 
<link href="../twitter-bootstrap-v2/docs/assets/css/bootstrap.css" rel="stylesheet">
</head>

<form class="form-horizontal" method='post' action='BorrarOficial.php'>
<fieldset>
		<legend>Borrar Oficiales </legend>

<div class="control-group">
				<label class="control-label" for="oficial1"> Oficial :  </label>
 					<div class="controls">

<select id="oficial1" name='oficial'>

	<?php
	while($row=mysql_fetch_array($oficiales))
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

$query2="DELETE FROM JEFExCadete WHERE oficial ='$oficial' ";

if (mysql_query($query2)){
echo "Se han borrado los hijos "; 

	$query="DELETE FROM oficial WHERE infante_de_marina='$oficial'";
if (mysql_query($query)) {
        echo "<br/>Las datos del oficial se han borrado correctamente ";
    } else {
        echo "<br/>Se ha producido un error con la consulta: $query";
    }


}else {
	echo "No se han borrado los hijos Ni tampoco el Oficial."; 
}

}

?>