<?php
include('../conexion.php');
?>


<form id="registraInfantedeMarina" method='get' action ='registrarInfantedeMarina.php' >
	Codigo : <input type='text' name='codigo' required/><br/>
	Nombre: <input type='text' name='nombre' required/><br/>
	Correo electronico: <input type='text' name='correo' required/><br/>
	Tipo: <select name='tipo'><br/>
			<option value=1 >1 </option>
			<option value=2 >2 </option>
			<option value=3 >3 </option>
			</select><br/>

	<input type='submit' name='registrar' value='Registrar'>
	
</form> 


<br/><a href='index.php'>volver</a>


<?php 
if (isset($_GET['registrar'])){
	$codigo=$_GET['codigo']; 
	$nombre=$_GET['nombre'];
	$correo=$_GET['correo'];
	$tipo=$_GET['tipo'];  //REVISAR ESTA PARTE
if (is_numeric($codigo) &&  preg_match ("/^[A-Za-z][A-Za-z -]*[A-Za-z]$/", $nombre) && filter_var($correo, FILTER_VALIDATE_EMAIL)  ) {
   
   $query="INSERT INTO infante_de_marina VALUES ('$codigo','$nombre',$tipo,'$correo')";
if (mysql_query($query)){
	echo "<br/> Infante de Marina registrado correctamente!."; 
}else {
	echo "<br/> Se ha producido un error en la consulta :$query"; 
	
}
    }else {
        echo "Datos no se guardaron, datos no correctos";
    }


}

?>