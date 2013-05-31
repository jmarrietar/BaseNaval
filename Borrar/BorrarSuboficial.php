<?php
include ('../conexion.php');
$suboficiales=mysql_query("SELECT * FROM suboficial");
?>

<html>
<form method='post' action='BorrarSuboficial.php'>
Elija el oficial que quiere Borrar

<select name='suboficial'>

	<?php
	while($row=mysql_fetch_array($suboficiales))
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
$query2="DELETE FROM JEFExCadete WHERE suboficial='$suboficial'"; 

if (mysql_query($query2)){
	echo "Se han borrado los hijos"; 

		$query="DELETE FROM suboficial WHERE infante_de_marina='$suboficial'";
if (mysql_query($query)) {
        echo "<br/>Las datos del suboficial se han borrado correctamente ";
    } else {
        echo "<br/>Se ha producido un error con la consulta: $query";
    }


} else {
	echo "No se han borrado los hijos Ni tampoco el Suboficial."; 
}

}

?>