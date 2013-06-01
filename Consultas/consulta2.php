<?php
include ('../conexion.php'); 
$oficialesMax=mysql_query("select * from infante_de_marina 
WHERE 
codigo in  (SELECT oficial 
		  FROM (
	              SELECT oficial,  COUNT(oficial) as conteo
			      FROM jefexcadete 
				  GROUP BY oficial
               )  t1 
		WHERE t1.conteo= (SELECT  COUNT(oficial) as cuenta 
			      FROM jefexcadete 
				  GROUP BY oficial order by cuenta DESC limit 1 
                  ) 
				  ) "
			) ;

?>


Los Oficiales que mas han tenido cadetes son : 
 <FORM METHOD="post" ACTION='consulta2.php'>
<INPUT TYPE='submit' NAME='Mostrar_Oficiales' VALUE ='Mostrar'></center>

</FORM> 

<?php
 
if (isset ($_POST['Mostrar_Oficiales'])) {
	extract($_POST);

while ($row=mysql_fetch_array($oficialesMax)){
	echo "</br>$row[0]-$row[1]-$row[2]-$row[3]";
}

}



?>