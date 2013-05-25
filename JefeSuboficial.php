<?php
include ('conexion.php');
$cadetes=mysql_query("SELECT * FROM cadete");
$suboficiales=mysql_query("SELECT * FROM suboficial");
?>


<html>
<form method='post' action='JefeSuboficial.php'>
Elije el  cadete  al cual se asignara Jefe   <!-- Nota , hacer algo para que no muestre los que ya tengan jefe--> 
<select name='cadete'>
<?php

	while ($row=mysql_fetch_array($cadetes)){
echo "<option value='$row[0]'> $row[0]-$row[1]</option>";

	}
?>

</select></br>
Elije el Suboficial que sera su jefe

<select name='suboficial'>

<?php
	while ($row=mysql_fetch_array($suboficiales)){
		echo"<option value='$row[0]'>$row[0]</option>";  // Hacer un Join con La tabla padre para mostrar nombre tamnbien

	}

?>

</select>

</br>

Fecha de Inicio<input type='date' name='fecha_inicio'><br/>
Fecha de Fin <input type ='date' name='fecha_fin'><br/>

<br/>
<input type='submit' name='registrar' value='Registrar'></br>
<a href='index.php'>Volver</a>
</form>
</html>


<?php
if (isset($_POST['registrar'])){
	extract($_POST);

$query="INSERT INTO jefexcadete (cadete,suboficial,oficial,fecha_inicio,fecha_fin) VALUES ('$cadete','$suboficial',null,'$fecha_inicio','$fecha_fin')";

if(mysql_query($query)){
	echo"</br> El jefe se asigno correctamente";
}else {
	echo "<br/> Se ha producido un error en la consulta $query";
}

}
?>