<?php
session_start();
include("database.php");



if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $regex_email = '/^[a-zA-Z][a-zA-Z0-9]+@+[a-zA-Z]+.+[a-zA-Z]+$/';
    $errors = [];

    if (!preg_match($regex_email, $_POST["login-username"]) || empty($_POST['login-username'])) {
        $errors[] = "L'adresse email est invalide.";
    }

    if (strlen($_POST['login-password']) < 8) {
        $errors[] = "Le mot de passe doit avoir au moins 8 caractères.";
    }

    if (
        !preg_match("/[A-Z]/", $_POST['login-password']) ||
        !preg_match("/[a-z]/", $_POST['login-password']) ||
        !preg_match("/[0-9]/", $_POST['login-password'])
    ) {
        $errors[] = "Le mot de passe doit contenir au moins une lettre majuscule, une lettre minuscule et au moins un chiffre.";
    }
    if(!empty($errors)){
        echo '<pre>';
        print_r($errors);
        echo '</pre>';
    }


    else{
        $mail =  $_POST['login-username'];
        $password = md5($_POST['login-password']);

        $requete = $database->prepare('SELECT * FROM employes WHERE mail = :mail');
        $requete->execute([':mail' => $mail]);
        $utilisateur = $requete->fetch();
        if($utilisateur >0){$errors[]="email introuvable";}
        //var_dump($utilisateur);

        if ($utilisateur==true && $password===$utilisateur['password']) {
            
            $_SESSION['user'] =$utilisateur;
            // var_dump($_SESSION['user']);
            // die();
            
         header('location:../tache.php');
            
        } else {
            echo "Adresse mail ou mot de passe incorrect.";
        }
    }
}

?>