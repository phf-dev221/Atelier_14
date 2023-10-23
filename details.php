<?php 
session_start();
include("traitement/database.php");
$id=$_POST['detailmasque'];
$_SESSION['id_tache']=$id;
$requete=$database->query("SELECT * FROM taches WHERE id= $id");
$row=$requete->fetch(PDO::FETCH_ASSOC);
?>


<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/details.css">
    <title>Gestion des Taches</title>
</head>

<body>
    <div class="navbar">
        <h1>Gestion des Taches</h1>
    </div>
    <div class="home">
        <div class="tach-container">
            <h2 class="lp">
                <?php
                print_r($row['titre']);
                ?>
            </h2>
            <div class="base-container">
                <p class="redColor">Priorité:<?php print_r($row['priorite']) ?></p>
                <p class="grenColor">Statut: <?php print_r($row['statut']) ?></p>
                <p class="echeanceColor">Echeance: <?php print_r($row['echeance']) ?></p>
            </div>
            <p class='desc_asset'><?php print_r($row['description']) ?></p>

            <div class="contain_form">
            <form class="base-container" method="post" action="traitement/traitementdetail.php">
                <input class="grenBG" name="update" type="submit" value="Modifier">
            </form>
            <form class="base-container" method="post" action="traitement/traitementdetail2.php">
                <input class="redBG" name="delete" type="submit" value="Supprimer">
            </form>
            </div>

        </div>
    </div><br><br>
    <div class="home">
        <a href="tache.php">Retouner a la liste des taches</a>
    </div>
</body>

</html>

<?php
