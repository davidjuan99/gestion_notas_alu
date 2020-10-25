<?php
include '../model/connection.php';
try {
	$stmt=$pdo->prepare("INSERT INTO tbl_alumno (`id_alumno`,`nombre_alumno`,`apellido1_alumno`,`apellido2_alumno`, `grupo_alumno`, `email_alumno`, `passwd_alumno`) VALUES (NULL, ?, ?, ?, ?, ?, ?);");
		$nombre=$_POST['nombre_alumno'];
		$apellido1=$_POST['apellido1_alumno'];
		$apellido2=$_POST['apellido2_alumno'];
		$grupo=$_POST['grupo_alumno'];
		$email=$_POST['email_alumno'];
		$passwd=md5($_POST['passwd_alumno']);
		$stmt->bindParam(1,$nombre);
		$stmt->bindParam(2,$apellido1);
		$stmt->bindParam(3,$apellido2);
		$stmt->bindParam(4,$grupo);
		$stmt->bindParam(5,$email);
		$stmt->bindParam(6,$passwd);
		$stmt->execute();
		header("Location:../admin.page.php");
} catch (Exception $ex){
	$pdo->rollback();
	echo $ex->getMessage();
}



?>