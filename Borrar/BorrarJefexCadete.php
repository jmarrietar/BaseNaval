<?php
include ('../conexion.php');
$JefexCadetes=mysql_query("SELECT * FROM JefexCadete");
?>

<html>
<form method='post' action='BorrarJefexCadete.php'>
Elija el cadeteque quiere Borrar

<select name='JefexCadete'>

	<?php
	while($row=mysql_fetch_array($JefexCadetes))
echo "<option value ='$row[0]'>$row[1]-$row[2]-$row[3]-$row[4]</option>";
	?>


	</select></br>
<input type='submit' name='borrar' value='Borrar'>
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