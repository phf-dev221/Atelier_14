<?php
session_start();
include("database.php");
$id=$_SESSION['id_tache'];

if(isset($_SESSION['id_tache'])&& ($_SERVER['REQUEST_METHOD'] == 'POST') && (isset($_POST['send']))) {

    
        $nouveauTitre = strip_tags($_POST['task-title']);
    
        $nouvellePriorite = $_POST['task-priority'];
  
        $nouveauStatut = $_POST['task-status'];
    
        $nouvelleEcheance = $_POST['echeance'];
    
        $nouvelleDescription = strip_tags($_POST['task-description']);
    

    
}
    
    $req= $database->prepare("UPDATE taches SET titre= :titre, priorite = :priorite, statut = :statut, description = :description, echeance = :echeance WHERE id = $id");
    $req->execute(array(":titre"=> $nouveauTitre, ":priorite"=> $nouvellePriorite, ":statut"=> $nouveauStatut, ":description"=>$nouvelleDescription, ":echeance"=>$nouvelleEcheance));

    header("location: ../tache.php");
?>