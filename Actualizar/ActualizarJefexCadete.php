<?php
include ('../conexion.php');
$JefexCadetes=mysql_query("SELECT * FROM JefexCadete");
?>


<html>
<head> 
<meta charset="utf-8"> 
<link href="../twitter-bootstrap-v2/docs/assets/css/bootstrap.css" rel="stylesheet">
</head>

<body>
<form class="form-horizontal" method='post' action='ActualizarJefexCadete.php'>
	<fieldset>
		<legend>Actualizar JefexCadetes </legend>

		<div class="control-group">
				<label class="control-label" for="JefexCadete1"> JefexCadete :  </label>
 					<div class="controls">


 <select id="JefexCadete1" name='JefexCadete'>

	<?php
	while($row=mysql_fetch_array($JefexCadetes))
echo "<option value ='$row[0]'>$row[0]-$row[1]-$row[2]-$row[3]-$row[4]-$row[5]</option>";
	?>


	</select>

	</div>
		</div>


	<div class="control-group">
 			<label class="control-label" for="fecha1"> Fecha de Inicio  :  </label>
 				<div class="controls">

 <input id="fecha1"type='date' name='fecha_inicio' id="fecha1" required><br/>
	</div>
		</div>

			<div class="control-group">
 			<label class="control-label" for="fecha2"> Fecha de Fin :  </label>
 				<div class="controls">

<input id="fecha2"type='date' name='fecha_fin' id="fecha2"><br/> 

</div>
		</div>

	 <INPUT TYPE='submit' NAME='actualizar' VALUE ='actualizar'>

</form>
<br/> <a href='index.php'>volver</a>
</body>
</html>


<?php 
if (isset($_POST['actualizar'])){
	
	extract($_POST); 



	$query="UPDATE  jefexcadete SET fecha_inicio='$fecha_inicio',fecha_fin ='$fecha_fin' WHERE consecutivo='$JefexCadete' ";


	if (mysql_query($query)){
echo "<br/>Las datos del JefexCadete se han actualizado correctamente ";
	} else {
        	echo "<br/>Se ha producido un error con la consulta: $query";
    	}
}
?>