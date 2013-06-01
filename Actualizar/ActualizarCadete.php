<?php
include ('../conexion.php');
$cadetes=mysql_query("SELECT * FROM cadete");
?>

<html>
<form method='post' action='ActualizarCadete.php'>
Elija el Cadete el cual se actualizara 
<select name='cadete'>

	<?php
	while($row=mysql_fetch_array($cadetes))
echo "<option value='$row[0]'>$row[0]-$row[1]</option>";
	?>

</select></br>


Anio: <input type='text' name='anio'><br/>
<input type='submit' name='actualizar' value='Actualizar'>
</form>

<br/> <a href='index.php'>volver</a>

</html>

<?php 
if (isset($_POST['actualizar'])){
	extract($_POST); 


if ($anio==1 or $anio==2 or $anio==3 ){

	$query="UPDATE cadete SET anio ='$anio' WHERE infante_de_marina='$cadete' ";
if (mysql_query($query)) {
        echo "<br/>Las actualizaciones del cadete se registraron correctamente ";
    } else {
        echo "<br/>Se ha producido un error con la consulta: $query";
    }

}else {
	echo "<br>Numero no se encuentra entre valores {1,2,3}.";

}



}

?>