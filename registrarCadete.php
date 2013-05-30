<?php
include ('conexion.php'); 
$cadetes=mysql_query("SELECT * FROM infante_de_marina WHERE tipo=3 "); 
?> 

<html>

<form id ="registrarCadete" method='post' action ='registrarCadete.php'>
Elije el Cadete que desea especificar
<select name='cadete'>
	
	<?php 
	while ($row =mysql_fetch_array ($cadetes) ) {
	echo "<option value ='$row[0]' > $row[0]- $row[1]</option>";
	
	}
	?>

</select>
<br/>

Anio: <input type='text' name='anio'><br/>

<input type='submit' name='registrar' value='Registrar'>
</form>

<br/> <a href='index.php'>volver</a>

</html> 

<?php 
if (isset($_POST['registrar'])){
	extract($_POST); 
	$query="INSERT INTO cadete VALUES ('$cadete','$anio')";
if (mysql_query($query)) {
        echo "<br/>Las especificaciones del cadete se registraron correctamente ";
    } else {
        echo "<br/>Se ha producido un error con la consulta: $query";
    }

}
?>











