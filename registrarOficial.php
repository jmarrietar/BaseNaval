<?php
include('conexion.php');
$oficiales=mysql_query("SELECT * FROM infante_de_marina WHERE tipo =1");

?>

<html>
<form method='post ' action ='registrarOficial.php'>
	Elija el Oficial que desea especificar
	<select name='oficial'>

		<?php
			while ($row=mysql_fetch_array($oficiales)){
echo "<option value='$row[0]'> $row[0]-$row[1]</option>";  // DECIRLE A PINEDA QUE ME EXPLIQUE ESTO. 


			}

		?>
</select></br>


Arma: <select name='arma'><br/>
<option value='Superficie'>Superficie</option>
<option value='Ingenieria'>Ingenieria</option>
<option value='Oceanografia'>Oceanografia</option>
<option value='Logistica'>Logistica'</option>

</select></br>
 <input type='submit' name='registrar' value='Registrar'>

</form> 


<br/><a href='index.php'>volver</a>

</html>




<?php
if (isset($_GET['registrar'])){
	$arma=$_GET['arma']; 
	$oficial=$_GET['oficial'];

$query="INSERT INTO oficial VALUES ('$oficial','$arma')";

if (mysql_query($query)){
	echo "<br/> Infante de Marina registrado correctamente!."; 
}else {
	echo "<br/> Se ha producido un error en la consulta :$query"; 
}
}

?>

 