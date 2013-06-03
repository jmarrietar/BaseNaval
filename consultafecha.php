<html>
<head>
<script>

 function validarfecha(){
	
 var fecha = document.getElementById("fecha").value;
 var fechaArr = fecha.split('-');
 var aho = fechaArr[0];
 var mes = fechaArr[1];
 var dia = fechaArr[2];
 
 var calendario = new Date(aho, mes - 1, dia);//mes empieza de cero Enero = 0

 if(calendario && calendario.getFullYear() == aho && calendario.getMonth() == mes -1 && calendario.getDate() == dia){
 document.getElementById("env").click();
 }else{
 alert("Ingresa una fecha correcta asi: AAA-MM-DD")
 }
}
</script>

</head>


<body>
<FORM METHOD="post" ACTION="consultafecha.php">


<center><h1>Consultar Asignacion Jefe- Cadete</h1></center>
<title>Ingrese una Fecha</title>
<blockquote>Ingrese la fecha desde la cual desea examinar los datos asi: Ano -Mes -Dia (ejemplo: 1945-04-30)</blockquote>
<br>
<center><INPUT TYPE='date' NAME='fecha' id="fecha"><br>



</FORM>
<center><input type="button"  onclick="validarfecha()" value='Consultar' "></center>
 <button type='submit'    id="env" name='consultar' value='Consultar' style="color: transparent; background-color: transparent; border-color: transparent;" > </button>

</BODY>
</html> 



<?php
include ('conexion.php');


if (isset($_POST['fecha'])) {
$fecha = $_POST['fecha'];
$jefexoficial=mysql_query("SELECT * FROM  jefexcadete WHERE fecha_inicio>'$fecha'");

print  "Codigo Cadete Ingresado el dia  ".$fecha." ". "o posterior:";

while ($row =mysql_fetch_array ($jefexoficial) ) {
	
	echo "</br>$row[1]";
	
	}
	} 

?>




