<?php
include '../model/admin.php';
include '../model/adminDAO.php';
if (isset($_POST['email_admin'])) {
    $user = new Admin($_POST['email_admin'], md5($_POST['passwd_admin']));
    $userDAO = new AdminDAO();
    if($userDAO->login($user)){
        echo 'perfect';
        // establecer sesiones
        // redirección a ebook.admin.php
        header('Location: ../admin.page.php');
    }else {
        header('Location: ../login.php');
        echo "fallo";
    }
}else {
    header('Location: ../login.php');
    //echo "no entra en el primer if";
}