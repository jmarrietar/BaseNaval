<?php
include ('conexion.php');
$infantes=mysql_query("SELECT * FROM  infante_de_marina");
?>



<html>
<form method='post' action ='BorrarInfante.php'>
Elije el Infante que desea Borrar 
<select name='infante'>

<?php
	while ($row=mysql_fetch_array($infantes))
		echo "<option value='$row[0]'>$row[0]-$row[1]</option>"; 

?>
</select></br>

<input type='submit' name='borrar' value='Borrar'>

</form> 

</br>
<br/> <a href='index.php'>volver</a>
</html>


<?php 
if (isset($_POST['borrar'])){
	extract($_POST); 

	$query1= "DELETE FROM JEFExCadete WHERE oficial ='$infante' ";
	$query2= "DELETE FROM JEFExCadete WHERE suboficial ='$infante' ";
	$query3="DELETE FROM JEFExCadete WHERE cadete ='$infante' ";

	if (mysql_query($query1) && mysql_query($query2) && mysql_query($query3) ) {
		echo "Se han borrado los nietos";


		$query4="DELETE FROM oficial WHERE infante_de_marina='$infante'"; 
		$query5="DELETE FROM suboficial WHERE infante_de_marina='$infante'";
		$query6="DELETE FROM cadete WHERE infante_de_marina='$infante'";  

		if (mysql_query($query4) && mysql_query($query5) && mysql_query($query6) ){

			echo " Se han borrado todos los hijos"; 

					$query="DELETE FROM infante_de_marina WHERE codigo='$infante'";
				if (mysql_query($query)) {
      					  echo "<br/>Las datos del Infante se han borrado correctamente ";
    		} else {
      					  echo "<br/>Se ha producido un error con la consulta: $query";
  					  }

		}

	} else {
		echo " no se borraron nietos"; 
	}


}

?>