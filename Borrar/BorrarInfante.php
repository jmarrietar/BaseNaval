<?php
include ('../conexion.php');
$infantes=mysql_query("SELECT * FROM  infante_de_marina");
?>



<html>
<head> 
<meta charset="utf-8"> 
<link href="../twitter-bootstrap-v2/docs/assets/css/bootstrap.css" rel="stylesheet">
</head>

<form class="form-horizontal" method='post' action ='BorrarInfante.php'>

	<fieldset>
		<legend>Borrar Infante</legend>

<div class="control-group">
				<label class="control-label" for="infante1"> Suboficial  :  </label>
 					<div class="controls">

<select id="infante1" name='infante'>

<?php
	while ($row=mysql_fetch_array($infantes))
		echo "<option value='$row[0]'>$row[0]-$row[1]</option>"; 

?>
</select>
</div>
		</div>
		

<div class="form-actions">
 	
 		<button type="submit" class="btn btn-primary " name='borrar' value='Borrar'>Borrar</button>

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