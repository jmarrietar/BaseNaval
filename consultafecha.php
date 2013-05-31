<html>
<FORM METHOD="post" ACTION="consultafecha.php">
<center><h1>Consultar Asignacion Jefe- Cadete</h1></center>
<title>Ingrese una Fecha</title>
<blockquote>Ingrese la fecha desde la cual desea examinar los datos asi: Ano -Mes -Dia (ejemplo: 1945-04-30)</blockquote>
<br>
<center><INPUT TYPE='date' NAME='fecha'><br>
<INPUT TYPE='submit' NAME="consultar"></center>
</FORM>


</BODY>
</html> 



<?php
include ('conexion.php');


if (isset($_POST['fecha'])) {
$fecha = $_POST['fecha'];

$jefexoficial=mysql_query("SELECT * FROM  jefexcadete WHERE fecha_inicio>'$fecha'");

print  "Codigo Cadete Ingresado el dia  ".$fecha." ". "o posterior:";

while ($row =mysql_fetch_array ($jefexoficial) ) {
	
	echo "<option value ='$row[0]' > $row[1]</option>";
	
	}
	} 

?>




