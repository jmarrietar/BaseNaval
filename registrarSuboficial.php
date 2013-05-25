<?php
include('conexion.php');
$suboficiales=mysql_query("SELECT * FROM infante_de_marina WHERE tipo =2");
?>

<html>
<form id ='registrarSuboficial' method='post' action='registrarSuboficial.php'>
Elija el Suboficial que desea especificar. 
<select name='suboficial'>

<?php
	while($row=mysql_fetch_array($suboficiales)){
		echo "<option value='$row[0]'> $row[0] - $row[1]</option>";
	}

?>

</select>
<br/>

<input type='submit' name ='registrar' value='Registrar'>

</form>

</select></br>
<br/><a href='index.php'> Volver</a>
</html>

<?php
if (isset($_POST['registrar'])){
	extract($_POST);
	$query="INSERT INTO suboficial VALUES ('$suboficial')";

	if(mysql_query($query)){
		echo "<br/>Las especificaciones del suboficial se registraron correctamente";

	}else {
		echo "<br/> Se ha producido un error en la consulta: $query";
	}

}
?>