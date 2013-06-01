<?php
include('../conexion.php');
$oficiales=mysql_query("SELECT * FROM infante_de_marina WHERE tipo =1");

?>

<html>
<head> 
<meta charset="utf-8"> 


<link href="../twitter-bootstrap-v2/docs/assets/css/bootstrap.css" rel="stylesheet">
</head>

<form class="form-horizontal" method='post ' action ='registrarOficial.php'>
	<fieldset>
		<legend>Registro de Oficiales</legend>
			<div class="control-group">
				<label class="control-label" for="oficial1"> Oficial  :  </label>
 					<div class="controls">

	<select id="oficial1" name='oficial'>

		<?php
			while ($row=mysql_fetch_array($oficiales)){
echo "<option value='$row[0]'> $row[0]-$row[1]</option>";  // DECIRLE A PINEDA QUE ME EXPLIQUE ESTO. 


			}

		?>
</select>

		</div>
		</div>

<div class="control-group">
 			<label class="control-label" for="arma1"> Arma:  :  </label>
 				<div class="controls">

 <select id="arma1"name='arma'><br/>
<option value='Superficie'>Superficie</option>
<option value='Ingenieria'>Ingenieria</option>
<option value='Oceanografia'>Oceanografia</option>
<option value='Logistica'>Logistica'</option>

</select>

			</div>
		</div>

<div class="form-actions">
 		<button type="submit" class="btn btn-primary " name='registrar' value='Registrar'>Registrar</button>

</form>


<br/><a href='index.php'>volver</a>

</html>




<?php
if (isset($_GET['registrar'])){
	$arma=$_GET['arma']; 
	$oficial=$_GET['oficial'];

$query="INSERT INTO oficial VALUES ('$oficial','$arma')";

if (mysql_query($query)){
	echo "<br/> Oficial registrado correctamente!."; 
}else {
	echo "<br/> Se ha producido un error en la consulta :$query"; 
}
}

?>

 