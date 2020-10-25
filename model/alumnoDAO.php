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
			echo "<a href='modificar_alumno.php?id={$id}'>Modificar</a>"." ";
			echo "<a href='eliminar_alumno.php?id={$id}'>Eliminar</a>"." ";
			echo $id;
		//$enviar=$enviar."'>Modificar</a>";
			echo "{$alumno['nombre_alumno']} , ";
			echo "{$alumno['apellido1_alumno']} , ";
			echo "{$alumno['apellido2_alumno']} , ";
			echo "{$alumno['grupo_alumno']} , ";
			echo "{$alumno['email_alumno']} , ";
			echo "{$alumno['passwd_alumno']}<br>";
    }
   }
    //public function filtro(){

    //}
    public function insertar(){
    	try {
    		include '../model/connection.php';
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
			header("Location:../admin.page.php");
		} catch (Exception $ex){
			$pdo->rollback();
			echo $ex->getMessage();
		}


    }

	}  
	  
