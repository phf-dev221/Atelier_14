<?php
session_start();    
if (isset($_SESSION["user"]) ){
    $user_id = $_SESSION["user"]["id"];
    var_dump($user_id);
}
include("database.php");

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $titre =  strip_tags($_POST['task-title']);
    $priorite = $_POST['task-priority'];
    $statut = $_POST['task-status'];
    $description = strip_tags($_POST['task-description']);
    $echeance = $_POST['echeance'];

    $requete=$database->prepare("INSERT INTO taches(titre, priorite, statut, description, echeance, employe_id)VALUES(:titre, :priorite, :statut, :description, :echeance, :employe_id)");
    $requete->execute(array(
        ":titre"=> $titre,
        ":priorite"=> $priorite,
        ":statut"=> $statut,
        ":description"=> $description,  
        ":echeance"=> $echeance,
        ":employe_id"=>$user_id
    ) );
    header("location:../tache.php");
}

?>