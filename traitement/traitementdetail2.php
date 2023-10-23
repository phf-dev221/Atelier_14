<?php
session_start();
include("database.php");

$id=$_SESSION['id_tache'];
$requete=$database->query("SELECT * FROM taches WHERE id= $id");
$row=$requete->fetch(PDO::FETCH_ASSOC);
// var_dump($row);
// $new=$row['statut'];
// $etat='en_cours';

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $supp=$_POST['delete'];
    // var_dump($modifie);
    if(isset($supp)){
        // $new = 'terminee';
        $req= $database->prepare("DELETE FROM taches WHERE id = :id");
        $req->execute(array(":id"=>$id));
        // var_dump($req);
        header("location: ../tache.php");

}
}
else{
    echo"erreur";
}


    ?>