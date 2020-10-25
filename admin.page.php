<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php
	require_once './controller/session_controller.php';
?>
<button><a href="./view/insertar_alumnos.php">Insertar alumnos</button></a><br><br><br>
<?php

	include './model/alumnoDAO.php';
	$mostrar_alu=new AlumnoDAO;
	echo $mostrar_alu->mostrar();
	/*$result= mysqli_query($pdo, $sql);
	if (mysqli_num_rows($result) > 0) {
  	// output data of each row
  		while($row = mysqli_fetch_assoc($result)) {
    	echo "id: " . $row["id_alumno"]. " - Nombre: " . $row["nombre_alumno"]. " - Apellido:" . $row["apellido1_alumno"]. "<br>";
  		}
	} else {
	  echo "0 results";
	}*/

?>
</body>
</html>