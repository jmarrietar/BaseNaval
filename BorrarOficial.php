<?php
include ('conexion.php');
$oficiales=mysql_query("SELECT * FROM oficial");
?>

<html>
<form method='post' action='BorrarOficial.php'>
Elija el oficial que quiere Borrar

<select name='oficial'>

	<?php
	while($row=mysql_fetch_array($oficiales))
echo "<option value ='$row[0]'>$row[0]</option>";
	?>

</select></br>
<input type='submit' name='borrar' value='Borrar'>
</form>
<br/> <a href='index.php'>volver</a>
</html>

<?php 
if (isset($_POST['borrar'])){
	extract($_POST); 
	$query="DELETE FROM oficial WHERE infante_de_marina='$oficial'";
if (mysql_query($query)) {
        echo "<br/>Las datos del oficial se han borrado correctamente ";
    } else {
        echo "<br/>Se ha producido un error con la consulta: $query";
    }
}

?>