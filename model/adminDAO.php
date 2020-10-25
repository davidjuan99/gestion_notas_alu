<?php
//DAO=Data Access Object
require_once 'admin.php';
class AdminDao{
    private $pdo;

    public function __construct(){
        include 'connection.php';
        $this->pdo=$pdo;
    }

    public function login($user){
        $query = "SELECT * FROM tbl_admin WHERE email_admin=? AND passwd_admin=?";
        $sentencia=$this->pdo->prepare($query);
        $email=$user->getEmailAdmin();
        $passwd=$user->getPasswdAdmin();
        $sentencia->bindParam(1,$email);
        $sentencia->bindParam(2,$passwd);
        $sentencia->execute();
        $result=$sentencia->fetch(PDO::FETCH_ASSOC);
        $numRow=$sentencia->rowCount();
        echo $numRow;
        if(!empty($numRow) && $numRow==1){
            //Creamos la sesión
            $user->setIdAdmin($result['id_admin']);
            session_start();
            $_SESSION['email_admin']=$user;
            return true;
        }else {
            return false;
        }
    }
}

?>