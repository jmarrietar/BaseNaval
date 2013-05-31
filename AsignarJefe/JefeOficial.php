<?php
include('../conexion.php');
$cadetes=mysql_query("SELECT * FROM cadete"); //Aqui se podria hacer un JOIN. con infante de marina.. Nombre.
$oficiales=mysql_query("SELECT * FROM oficial");   
?>

<html>

<form method='post' action ='JefeOficial.php'>
Elije el Cadete al cual se asignara Jefe
<select name='cadete'>

	<?php
		while($row=mysql_fetch_array($cadetes)){

echo "<option value='$row[0]'> $row[0]-$row[1]</option>";

		}
	?>

</select></br>

Elije el Oficial que sera su jefe

<select name='oficial'>

	<?php
		while($row=mysql_fetch_array($oficiales)){
echo "<option value='$row[0]'> $row[0]-$row[1]</option>";
		}
	?>

</select>
</br>
Fecha de Inicio <input type='date' name='fecha_inicio'><br/> 
Fecha de Fin <input type='date' name='fecha_fin'><br/>  
<input type='submit' name='registrar' value='Registrar'>
</form>
<br/>
<a href='index.php'>volver</a>

</html>

<?php
if (isset($_POST['registrar'])){
	extract($_POST);
$query="INSERT INTO jefexcadete (cadete,suboficial,oficial,fecha_inicio,fecha_fin)  VALUES ('$cadete',null,'$oficial','$fecha_inicio','$fecha_fin')";

if (mysql_query($query)){
	echo "</br>El  jefe se asigno correctamente"; 

}else {
	echo "<br/>Se ha producido un error con la consulta: $query";
    }
}



?>




