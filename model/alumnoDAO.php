<?php  
require_once 'alumno.php';
class AlumnoDao{
    private $pdo;

    public function __construct(){
        //include './model/connection.php';
        //$this->pdo=$pdo;
    }
    public function mostrar(){
    	include './model/connection.php';
    	$sql="SELECT * FROM tbl_alumno";
		$sentencia=$pdo->prepare($sql);
		$sentencia->execute();

		$lista_alumno=$sentencia->fetchAll(PDO::FETCH_ASSOC);

		foreach ($lista_alumno as $alumno) {
			$id=$alumno["id_alumno"]." ";
			echo "<a href='./model/actualizar.php?id_alumno={$id}'>Modificar</a>"." ";
			echo "<a href='./admin.page.php?id_alumno={$id}'>Eliminar</a>"." ";
		/*	echo $id;*/
		//$enviar=$enviar."'>Modificar</a>";
			echo "{$alumno['nombre_alumno']} , ";
			echo "{$alumno['apellido1_alumno']} , ";
			echo "{$alumno['apellido2_alumno']}<br>";
    }
   }
    public function insertar(){
    	try {
    		include '../model/connection.php';
    		$pdo->beginTransaction();
			$stmt=$pdo->prepare("INSERT INTO tbl_alumno (`id_alumno`,`nombre_alumno`,`apellido1_alumno`,`apellido2_alumno`, `grupo_alumno`, `email_alumno`, `passwd_alumno`) VALUES (NULL, ?, ?, ?, ?, ?, ?);")	;
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
				$id_alumno=$pdo->lastInsertId();
				$query2="INSERT INTO tbl_nota (nombre_materia,id_alumno,nota) VALUES ('Fisica',?,0)";
                $result2=$pdo->prepare($query2);
                $result2->bindParam(1,$id_alumno);
                $result2->execute();

                $query="INSERT INTO tbl_nota (nombre_materia,id_alumno,nota) VALUES ('Mates',?,0)";
                $result=$pdo->prepare($query);
                $result->bindParam(1,$id_alumno);
                $result->execute();

                $query3="INSERT INTO tbl_nota (nombre_materia,id_alumno,nota) VALUES ('Programacion',?,0)";
                $result3=$pdo->prepare($query3);
                $result3->bindParam(1,$id_alumno);
                $result3->execute();
            $pdo->commit();
			header("Location:../admin.page.php");
		} catch (Exception $ex){
			$pdo->rollback();
			echo $ex->getMessage();
		}
	}

	public function borrar(){
		include './model/connection.php';

		try {
			$pdo->beginTransaction();
			$id=$_GET['id_alumno'];
			//echo $id;

			// Miramos si en la tabla notas hay alguna nota con la id del alumno escogido.
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

				$query="DELETE FROM `tbl_alumno` WHERE `id_alumno` = ?";
				$sentencia=$pdo->prepare($query);
				$sentencia->bindParam(1,$id);
				$sentencia->execute();
			}

		$pdo->commit();
		header("Location: ./admin.page.php");

	} catch (Exception $e) {
		$pdo->rollBack();
		echo $e;
	}
	}
	public function filtros(){
		include './model/connection.php';
    	$sql1="SELECT * FROM tbl_alumno WHERE nombre_alumno LIKE '%{$_POST['nombre_alumno']}%' AND apellido1_alumno LIKE '%{$_POST['apellido1_alumno']}%'";
		$sentencia=$pdo->prepare($sql1);
		$sentencia->execute();

		$lista_alumno=$sentencia->fetchAll(PDO::FETCH_ASSOC);

		foreach ($lista_alumno as $alumno) {
			$id=$alumno["id_alumno"]." ";
			echo "<a href='modificar_alumno.php?id={$id}'>Modificar</a>"." ";
			echo "<a href='./admin.page.php?id_alumno={$id}'>Eliminar</a>"." ";
		/*	echo $id;*/
		//$enviar=$enviar."'>Modificar</a>";
			echo "{$alumno['nombre_alumno']} , ";
			echo "{$alumno['apellido1_alumno']} , ";
			echo "{$alumno['apellido2_alumno']}<br>";
    	}
   	}
   		public function lecturamodi($id){
   		include '../model/connection.php';
        $query = "SELECT * FROM tbl_alumno WHERE id_alumno=?";
        $sentencia=$pdo->prepare($query);
        $sentencia->bindParam(1,$id);
        $sentencia->execute();
        $alumno=$sentencia->fetch(PDO::FETCH_ASSOC);
        return $alumno;
    }


    }

	  
	  
