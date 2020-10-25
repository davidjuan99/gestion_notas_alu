<?php 
require_once './model/admin.php';
session_start();
if (!isset($_SESSION['email_admin'])) {
    header('Location:./login.php');
}
echo '<div><h1>Bienvenido '.$_SESSION['email_admin']->getEmailAdmin().'</h1><h1 style="float: right;"><a href="./controller/logout_controller.php">Logout</a></h1></div>';   
?>