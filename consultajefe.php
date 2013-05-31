<html>
<center><h2>"Ingrese Codigo"</h2></center>
<FORM method="POST" action="consultajefe.php"

<br>
<center><INPUT TYPE='text' NAME='jefe'><br>
<input type="submit" name="consultar"></center>
</FORM>
</html>

<?php
include ('conexion.php');


if (isset($_POST['jefe'])) {
$jefe = $_POST['jefe'];

$jefelider=mysql_query("SELECT * FROM  jefexcadete WHERE suboficial='$jefe' OR oficial='$jefe'  ");

echo  "El Jefe identificado con codigo  ".$jefe." ha liderado a los cadetes: </br>";

while ($row =mysql_fetch_array ($jefelider) ) {
	echo "$row[1]</br>";
	
	}
	} 

?>



<a href='index.php'>volver</a>

</html>
