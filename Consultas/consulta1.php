<?php
include ('../conexion.php'); 
$suboficiales0=mysql_query("select * from infante_de_marina
where codigo in (
SELECT infante_de_marina FROM suboficial left outer join jefexcadete 
ON suboficial.infante_de_marina=jefexcadete.suboficial
WHERE jefexcadete.suboficial IS NULL
)") ;

?>

Los Suboficiales que han tenido cadetes a su mando: 
 <FORM METHOD="post" ACTION='consulta1.php'>
<INPUT TYPE='submit' NAME='Mostrar_Suboficiales' VALUE ='Mostrar'></center>


</FORM> 

</br>

<?php 
if (isset ($_POST['Mostrar_Suboficiales'])) {
	extract($_POST);

while ($row=mysql_fetch_array($suboficiales0)){
	echo "</br>$row[0]-$row[1]-$row[2]-$row[3]";
}

}



?>


