<?php
include ('conexion.php');
$cadetes=mysql_query("SELECT * FROM cadete");
?>


<html>
<form method='post' action='Borrarcadete.php'>
Elija el cadeteque quiere Borrar

<select name='cadete'>

	<?php
	while($row=mysql_fetch_array($cadetes))
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
	$query="DELETE FROM cadete WHERE infante_de_marina='$cadete'";
if (mysql_query($query)) {
        echo "<br/>Las datos del cadete se han borrado correctamente ";
    } else {
        echo "<br/>Se ha producido un error con la consulta: $query";
    }
}

?>