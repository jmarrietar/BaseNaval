<?php
include ('../conexion.php');
$cadetes=mysql_query("SELECT * FROM cadete");
?>

<html>
<head> 
<meta charset="utf-8"> 
<script>
function validarmodulo() {
    var ano = document.getElementById("ano").value;
    
	
        if(isNaN(ano) ){
		alert("El valor ingresado debe ser numérico");
	}
	
	
	
	
	
	document.getElementById("uts").click();

}



</script>

<link href="../twitter-bootstrap-v2/docs/assets/css/bootstrap.css" rel="stylesheet">
</head>


<body>
<form class="form-horizontal" method='post' action='ActualizarCadete.php'>

<fieldset>
		<legend>Actualizar Cadetes</legend>
		<div class="control-group">
 			<label class="control-label" for="cadete1"> Cadete  :  </label>
 				<div class="controls">

<select name='cadete'>

	<?php
	while($row=mysql_fetch_array($cadetes))
echo "<option value='$row[0]'>$row[0]-$row[1]</option>";
	?>

</select>
		</div>
		</div>


 <div class="control-group">
 	 <label class="control-label" for="codigo1">Anio : </label>
 	 <div class="controls">

 <input type='text' id='ano' name='anio' required><br/>
 <p class="help-block">Por favor Ingresa un Año valido (1,2 o 3 ). </p>

	</div>
		</div>

<div class="form-actions">
 		
        <input type="button"  onclick="validarmodulo()" value='Actualizar' class="btn btn-primary ">
                <button type="submit"  name='actualizar' value='Actualizar' id='uts'style="color: transparent; background-color: transparent; border-color: transparent;" > </button>
</form>
</br>
<br/> <a href='index.php'>volver</a>
</body>
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