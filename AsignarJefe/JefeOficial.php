<?php
include('../conexion.php');
$cadetes=mysql_query("SELECT * FROM cadete"); //Aqui se podria hacer un JOIN. con infante de marina.. Nombre.
$oficiales=mysql_query("SELECT * FROM oficial");   
?>

<!DOCTYPE html> 
<html > 
<head> 
<script>function validarfecha1(){
var fechainicial = document.getElementById("fecha1").value;	
var fechaArr = fechainicial.split('-');
 var aho = fechaArr[0];
 var mes = fechaArr[1];
 var dia = fechaArr[2];
 
 if(fechainicial==""){
 alert("Ingresa la fecha inicial")
 }
 var calendario = new Date(aho, mes - 1, dia);//mes empieza de cero Enero = 0

 if(calendario && calendario.getFullYear() == aho && calendario.getMonth() == mes -1 && calendario.getDate() == dia){
 
  return true;
 }else{
 alert("Ingresa una fecha correcta inicial asi: AAA-MM-DD")

 }
}</script>

<script>function validarfecha2(fechafinal){
 var fechafinal = document.getElementById("fecha2").value;
	
  if(fechafinal==""){
	  
		 
		 return true;
	 }
 

 var fechaArr = fechafinal.split('-');
 var aho = fechaArr[0];
 var mes = fechaArr[1];
 var dia = fechaArr[2];
 
 var calendario = new Date(aho, mes - 1, dia);//mes empieza de cero Enero = 0

 if(calendario && calendario.getFullYear() == aho && calendario.getMonth() == mes -1 && calendario.getDate() == dia){
 return true;
 }else{
 alert("Ingresa una fecha final correcta asi: AAA-MM-DD")
 }
 
 
}</script>



<script>
 function validarfechas(){
	 var r1=validarfecha1();
	 var r2= validarfecha2();
	 if( r1&&r2){
	 document.getElementById("env").click();
	 }
 
 }
</script>
<meta charset="utf-8"> 

<link href="../twitter-bootstrap-v2/docs/assets/css/bootstrap.css" rel="stylesheet">
</head>

<body>
<form class="form-horizontal" method='post' action ='JefeOficial.php'>
	<fieldset>
		<legend>Asignacion Jefe Oficial a Cadete </legend>

		<div class="control-group">
 			<label class="control-label" for="cadete2"> Cadete  :  </label>
 				<div class="controls">

<select id="cadete2"name='cadete'>

	<?php
		while($row=mysql_fetch_array($cadetes)){

echo "<option value='$row[0]'> $row[0]-$row[1]</option>";

		}
	?>

</select>

		</div>
		</div>


<div class="control-group">
				<label class="control-label" for="oficial2"> Oficial  :  </label>
 					<div class="controls">

<select id="oficial2" name='oficial'>

	<?php
		while($row=mysql_fetch_array($oficiales)){
echo "<option value='$row[0]'> $row[0]-$row[1]</option>";
		}
	?>

</select>

</div>
		</div>

		<div class="control-group">
 			<label class="control-label" for="fecha1"> Fecha de Inicio  :  </label>
 				<div class="controls">

 <input id="fecha1"type='date' name='fecha_inicio' id=fecha1 required><br/>
	</div>
		</div>

			<div class="control-group">
 			<label class="control-label" for="fecha2"> Fecha de Fin :  </label>
 				<div class="controls">

<input id="fecha2"type='date' name='fecha_fin' id="fecha2"><br/> 

</div>
		</div>


<div class="form-actions">
 		
       <input type="button"  onclick="validarfechas()" value='Registrar' class="btn btn-primary ">



   <button type="submit"   id="env" name='registrar' value='Registrar*' id="env" style="color: transparent; background-color: transparent; border-color: transparent;" > </button>
        
 
</form>
<br/>
<a href='index.php'>volver</a>
</body>
</html>

<?php

if (isset($_POST['registrar'])){
	extract($_POST);

$fecha_iniciox=(explode("-",$fecha_inicio));
$fecha_finx=(explode("-",$fecha_fin)); 
if (isset($fecha_iniciox[1]) && isset($fecha_iniciox[0]) && isset($fecha_iniciox[2])) {
 


if (checkdate( $fecha_iniciox[1],$fecha_iniciox[2], $fecha_iniciox[0])){

	if (isset($fecha_finx[1]) && isset($fecha_finx[0]) && isset($fecha_finx[2])) {

 	if (checkdate( $fecha_finx[1],$fecha_finx[2], $fecha_finx[0])){

 		$query="INSERT INTO jefexcadete (cadete,suboficial,oficial,fecha_inicio,fecha_fin)  VALUES ('$cadete',null,'$oficial','$fecha_inicio','$fecha_fin')";

			if (mysql_query($query)){
					echo "</br>El  jefe se asigno correctamente1"; 

			}else {
					echo "<br/>Se ha producido un error con la consulta: $query";
   				 }

	}else {
		echo "<br/>Fecha de fin no valida1";
	}

}else if ($fecha_fin==0000-00-00) {

	$query="INSERT INTO jefexcadete (cadete,suboficial,oficial,fecha_inicio,fecha_fin)  VALUES ('$cadete',null,'$oficial','$fecha_inicio','$fecha_fin')";

			if (mysql_query($query)){
					echo "</br>El  jefe se asigno correctamente2"; 

			}else {
					echo "<br/>Se ha producido un error con la consulta: $query";
   				 }

}else {
	echo "<br/> Fecha de fin no valida2";
}



		} else {
 			 echo " <br/>la fecha de inicio  no es valida"; 
 }

}else {
	echo "</br>fecha inicio invalida";
}

}

 ?>




