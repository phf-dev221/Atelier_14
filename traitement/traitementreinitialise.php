<?php
include("database.php");
if($_SERVER['REQUEST_METHOD']=="POST"){
    if(isset($_POST["send"])){
        $email=$_POST["email"];
        $password=$_POST["newPassword"];
        $password_confirmation=$_POST["confirmPassword"];

        $requete = $database->prepare("SELECT * FROM employes WHERE mail= :mail");
        $requete->execute(array(":mail"=>$email)) ;
        $correspondingMail = $requete->fetch(PDO::FETCH_ASSOC);
        // var_dump($correspondingMail);
        // die();
        if($correspondingMail >0){
            if($password === $password_confirmation){
                $reinitialise = $database->prepare("UPDATE employes SET password=:passworde WHERE mail=:mail");
                $reinitialise->execute(array(":passworde"=>$password, ":mail"=>$email));
                echo "mot de passe reinitialisé";
            }
            else{
                echo "Mot de passe différents, reessayez.";
            }
        }
        else{
            echo "vous n'etes pas inscris, cliquez <a href= '../index.php'>ICI</a>";
        }
}
}

?>