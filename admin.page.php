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
<form action="./admin.page.php" method="POST">
  <label for="nombre">Nombre:</label><br>
  <input type="text" id="nombre_alumno" name="nombre_alumno" placeholder="Nombre"><br><br>
  <label for="apellido1">1er apellido:</label><br>
  <input type="text" id="apellido1_alumno" name="apellido1_alumno" placeholder="Apellido Paterno"><br><br>
<input type="submit" value="Filtrar" name="b_filtro"><br><br>
<?php
	include './model/alumnoDAO.php';
	if (isset($_GET['id_alumno'])) {
		$borrar_alu = new AlumnoDAO;;
		$borrar_alu->borrar();
	}
	if (empty($_POST['b_filtro'])){
		$mostrar_alu=new AlumnoDAO;
		echo $mostrar_alu->mostrar();
	} else if (empty($_POST['nombre_alumno']) && empty($_POST['apellido1_alumno'])) {
    	$mostrar_alu=new AlumnoDAO;
		echo $mostrar_alu->mostrar();
	} else if (isset($_POST['nombre_alumno']) || isset($_POST['apellido1_alumno'])){
        $filtros_alu=new AlumnoDAO;
        $filtros_alu->filtros();
 	}
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