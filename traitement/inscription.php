<?php


include("database.php");

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    //verif données---------------------------------------------------------------------------------------------------

    $regex_email = '/^[a-zA-Z][a-zA-Z0-9]+@+[a-zA-Z]+.+[a-zA-Z]+$/';
    $errors = [];

    if (!preg_match("/^[A-Za-zÀ-ÖØ-öø-ÿ '-]+$/", $_POST['username'])||(empty($_POST['username']))) {
        $errors[]="nom invalide";
    }

    if ((!preg_match($regex_email, $_POST["email"]))||(empty($_POST['email']))) {
        $errors[] = "L'adresse email est invalide.";
    }

    if (strlen($_POST['password']) < 8) {
        $errors[] = "Le mot de passe doit avoir au moins 8 caractères.";
    }

    if (
        !preg_match("/[A-Z]/", $_POST['password']) ||
        !preg_match("/[a-z]/", $_POST['password']) ||
        !preg_match("/[0-9]/", $_POST['password'])
    ) {
        $errors[] = "Le mot de passe doit contenir au moins une lettre majuscule, une lettre minuscule et au moins un chiffre.";
    }

    if($_POST['confirm-password'] != $_POST['password']){
        $errors[] = 'Les mots de passes sont différents';
    }

    if(!empty($errors)){
       //print_r($errors);
       foreach($errors as $error){
           echo '<pre>'.$error.'</pre>';
           
       }
       echo 'veuillez <a href="../index.php">REESSAYER</a>"';
       die();
    }
  
    //fin verif----------------------------------------------------------------------------------------------------

    $nom =  $_POST['username'];
    $mail = $_POST['email'];
    $password = md5($_POST['password']);
   // $confirmpassword = $_POST['confirm-password'];
    $dateinsc = date('Y-m-d');

    //verif doublon email
    $doublons = $database->prepare('SELECT * FROM employes WHERE mail= :mail');
        $doublons->execute([':mail' => $mail]);
        $resultat = $doublons->fetchColumn();

        if($resultat > 0){
            echo "E-mail existant";
            die;
        }
    //fin verif

    $requete = $database->prepare("INSERT INTO employes(nom,  mail, password, dateinsc) VALUES(:nom, :mail, :password,:dateinsc)");
    $requete->execute(
        array(
             ':nom' => $nom,
             ':mail' => $mail,
             ':password' => $password,
             ':dateinsc' => $dateinsc
         )
     );

     echo 'inscription reussie veuillez cliquer <a href="../index.php">ICI</a>pour vous connecter"';
 }
 else{
    echo 'inscription errror';
 }


?>