<?php
include ('conexion.php');
$infantes=mysql_query("SELECT * FROM  infante_de_marina");
?>



<html>
<form method='post' action ='BorrarInfante.php'>
Elije el Infante que desea Borrar 
<select name='infante'>

<?php
	while ($row=mysql_fetch_array($infantes))
		echo "<option value='$row[0]'>$row[0]-$row[1]</option>"; 

?>
</select></br>

<input type='submit' name='borrar' value='Borrar'>

</form> 

</br>
<br/> <a href='index.php'>volver</a>
</html>


<?php 
if (isset($_POST['borrar'])){
	extract($_POST); 
	$query="DELETE FROM infante_de_marina WHERE codigo='$infante'";
if (mysql_query($query)) {
        echo "<br/>Las datos del Infante se han borrado correctamente ";
    } else {
        echo "<br/>Se ha producido un error con la consulta: $query";
    }
}

?>