<?php
session_start();
include("traitement/database.php");


if(!$_SESSION['user']){
    header('location:../home.php');
    die();
} 

$id_user = $_SESSION["user"]["id"];

$tabletask = $database->prepare("SELECT * FROM taches WHERE employe_id = :id_employe ");
$tabletask->execute(array(":id_employe"=> $id_user));

?>

<!DOCTYPE html>

<link rel="stylesheet" href="styles/tache.css">
<html>

<head>
    <title>Mes Tâches</title>
</head>

<body>
  
    <div class="navbar">
        <h1 class="leye">Gestion de Mes Tâches
            <div class="black">
        <?php
        if(isset($_SESSION["user"])){
        print_r($_SESSION["user"]["nom"]);
        }
        ?>
            </div>
    </h1>

    </div>
    <?php
    while($task= $tabletask->fetch(PDO::FETCH_ASSOC)):
        $_SESSION['details']=$task;
    ?>

    <div class="task-container">
        <h1 class="lp">
            <?Php
           echo " $task[titre]";
            ?>
        </h1>
        <p>
            <?php
            echo "$task[description]";
            ?>

        </p>
        <div class="inline-elements">
            <p>Priorité:
                <?php
                echo "$task[priorite]";
                ?>
            </p>
            <p class="paragraph">Statut:
                <?php
                echo "$task[statut]";
                ?>
            </p>
            
            
                <form method="post" action="details.php">
                <input type="hidden" name="detailmasque" value="<?= $task["id"]?>">
                <input type="submit" value="Voir plus" name="send" class="send">
                

               <!-- <a href='traitement/detailtraitement.php/?id=".$task["id"]."'></a> -->

               </form>          
             
        </div>
    </div>
    <?php
    endwhile;
    ?>
<?php

?>

    <form class="add-task" action="traitement/tachetraitement.php" method="post">
        <h1>Ajouter une nouvelle tâche</h1>
        <label for="task-title">Titre:</label>
        <input type="text" id="task-title" name="task-title">

        <label for="task-priority">Priorité:</label>
        <select id="task-priority" name="task-priority">
            <option value="faible">faible</option>
            <option value="moyenne">moyenne</option>
            <option value="elevee">elevee</option>
        </select>

        <label for="task-status">Statut:</label>
        <select id="task-status" name="task-status">
            <option value="a_faire">En cours</option>
            <option value="en_cours">En attente</option>
            <option value="terminee">Terminée</option>
        </select>

        <label for="echeance">Echeance:</label>
        <input type="datetime-local" id="echeance" name="echeance">

        <label for="task-description">Description:</label>
        <textarea id="task-description" name="task-description" rows="4"></textarea>
        <button>Ajouter</button>
    </form>

    <a href="traitement/deconnecter.php">se deconnecter ICI</a>

</body>

</html>
