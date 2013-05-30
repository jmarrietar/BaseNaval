<?php
include ('conexion.php');
$suboficiales=mysql_query("SELECT * FROM infante_de_marina WHERE tipo =2");
?>

<html>
<form method='post' action='ActualizarSuboficial.php'>
Elija el Suboficial el cual se actualizara 
<select name='suboficial'>

	<?php
	while($row=mysql_fetch_array($suboficiales))
echo "<option value='$row[0]'>$row[0]-$row[1]</option>";
	?>

</select>
<br/>

Asignacion: <select name='asignacion'></br>
<option value='sublogistico'>sublogistico</option>
<option value='instructor'>instructor</option>
<option value='operativo'>operativo</option>

</select></br>

<input type='submit' name='actualizar' value='Actualizar'>
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

