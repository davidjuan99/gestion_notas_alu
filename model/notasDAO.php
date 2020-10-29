<?php
require_once 'notas.php';
class NotaDao{
    private $pdo;

    public function __construct(){
    }

    public function notas(){
        include '../model/connection.php';
        $id=$_GET['id_alumno'];
        $query = "SELECT * FROM tbl_nota WHERE id_alumno=?";
        $sentencia=$pdo->prepare($query);
        $sentencia->bindParam(1,$id);
        $sentencia->execute();
        return $sentencia->fetchAll(PDO::FETCH_ASSOC);
    }
    public function update(){
    try {    
        include '../model/connection.php';
        $pdo->beginTransaction();
        $id=$_POST['id_alumno'];
        $query1="UPDATE `tbl_nota` SET `nota`=? WHERE `id_alumno` = ? AND nombre_materia LIKE 'Fisica';";
        $nota=$_POST['nota0'];
        echo $nota;
        $id=$_POST['id_alumno'];
        $sentencia1=$pdo->prepare($query1);
        $sentencia1->bindParam(1,$nota);
        $sentencia1->bindParam(2,$id);
        $sentencia1->execute();
        $query2="UPDATE `tbl_nota` SET `nota`=? WHERE `id_alumno` = ? AND nombre_materia LIKE 'Mates';";
        $id=$_POST['id_alumno'];
        $nota=$_POST['nota1'];
        $sentencia2=$pdo->prepare($query2);
        $sentencia2->bindParam(1,$nota);
        $sentencia2->bindParam(2,$id);
        $sentencia2->execute();
        $query3="UPDATE `tbl_nota` SET `nota`=? WHERE `id_alumno` = ? AND nombre_materia LIKE 'Programacion';";
        $id=$_POST['id_alumno'];
        $nota=$_POST['nota2'];
        $sentencia3=$pdo->prepare($query3);
        $sentencia3->bindParam(1,$nota);
        $sentencia3->bindParam(2,$id);
        $sentencia3->execute();
        print_r($sentencia3);
        $pdo->commit();
        header("Location: ../admin.page.php");
    } catch (Exception $e) {
        $pdo->rollBack();
        echo $e;
    }
}
}
?>