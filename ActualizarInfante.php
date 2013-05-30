<?php 
include('conexion.php'); 
$infantes=mysql_query("SELECT * FROM infante_de_marina");
?>

<html>
<form method='post ' action ='ActualizarInfante.php'>
Elije el Infante que desea actualizar 
<select name='infante'>

<?php
	while ($row=mysql_fetch_array($infantes))
		echo "<option value='$row[0]'>$row[0]-$row[1]</option>"; 

?>
</select></br>
	Nombre: <input type='text' name='nombre' /><br/>
	Correo electronico: <input type='text' name='correo' /><br/>
	Tipo: <select name='tipo'><br/>
			<option value=1 >1 </option>
			<option value=2 >2 </option>
			<option value=3 >3 </option>
			</select><br/>
<input type='submit' name='actualizar' value='Actualizar'>

</form> 

</br>
<br/> <a href='index.php'>volver</a>
</html>


<?php 
if (isset($_POST['actualizar'])){
	extract($_POST); 
	$query="UPDATE infante_de_marina
	  SET nombre ='$nombre',tipo='$tipo',correo_electronico='$correo'  
	  WHERE codigo='$infante' ";
if (mysql_query($query)) {
        echo "<br/>Las actualizaciones del Infante se registraron correctamente ";
    } else {
        echo "<br/>Se ha producido un error con la consulta: $query";
    }

    //ESTO NO ESTA ENTRANDO AQUI!! ¿POR QUE?
} 


?>