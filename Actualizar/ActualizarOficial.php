<?php
include ('../conexion.php');
$oficiales=mysql_query("SELECT * FROM infante_de_marina WHERE tipo =1");
?>


<html>
<form method='post' action='ActualizarOficial.php'>
Elija el oficial el cual se actualizara 
<select name='oficial'>

	<?php
	while($row=mysql_fetch_array($oficiales))
echo "<option value='$row[0]'>$row[0]-$row[1]</option>";
	?>

</select></br>
Arma: <select name='arma'><br/>
<option value='Superficie'>Superficie</option>
<option value='Ingenieria'>Ingenieria</option>
<option value='Oceanografia'>Oceanografia</option>
<option value='Logistica'>Logistica'</option></br>

<input type='submit' name='actualizar' value='Actualizar'>
</form>

<br/> <a href='index.php'>volver</a>

</html>


<?php 
if (isset($_POST['actualizar'])){
	extract($_POST); 
	$query="UPDATE oficial SET arma ='$arma' WHERE infante_de_marina='$oficial' ";
if (mysql_query($query)) {
        echo "<br/>Las actualizaciones del oficial se registraron correctamente ";
    } else {
        echo "<br/>Se ha producido un error con la consulta: $query";
    }
}

?>