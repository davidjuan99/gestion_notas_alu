<?php 
	include './connection.php';

	try {
		$pdo->beginTransaction();
		$id=$_GET['id_alumno'];
		//echo $id;

		// Miramos si en la tabla notas hay algunba nota con la id del alumno escogido.
		$query = "SELECT * FROM `tbl_nota` WHERE `id_alumno` = ?";
		$sentencia=$pdo->prepare($query);
		$sentencia->bindParam(1,$id);
		$sentencia->execute();
		$lista_notas=$sentencia->fetchAll(PDO::FETCH_ASSOC);
		// Si no hay ninguna nota solo eliminamos el alumno, de lo contrario eliminaremos también eliminaremos.
		if ($lista_notas!="") {
			$query="DELETE FROM `tbl_alumno` WHERE `id_alumno` = ?";
			$sentencia=$pdo->prepare($query);
			$sentencia->bindParam(1,$id);
			$sentencia->execute();

		} else {
			$query="DELETE FROM `tbl_nota` WHERE `id_alumno` = ?";
			$sentencia=$pdo->prepare($query);
			$sentencia->bindParam(1,$id);
			$sentencia->execute();

			$query="DELETE FROM `tbl_nota` WHERE `id_alumno` = ?";
			$sentencia=$pdo->prepare($query);
			$sentencia->bindParam(1,$id);
			$sentencia->execute();
		}

		$pdo->commit();
		header("Location: ../admin.page.php");

	} catch (Exception $e) {
		$pdo->rollBack();
		echo $e;
	}



?>