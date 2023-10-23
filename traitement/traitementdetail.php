<style>


.add-task {
    text-align: left;
    margin: 20px auto;
    background-color: white;
    padding: 20px;
    border-radius: 5px;
    width: 60%;
}


.add-task h1 {
    font-size: 27px;
    text-align: center;
    font-weight: bold;
    color: green;
}

.add-task label {
    display: block;
    margin-top: 10px;
    font-size: 19px;
}

.add-task select,
.add-task input[type="text"],
.add-task input[type="datetime-local"],
.add-task textarea {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

.add-task .button {
    background-color: green;
    color: white;
    border: none;
    padding: 10px 20px;
    border-radius: 5px;
    cursor: pointer;
    margin-top: 10px;
}

</style>











<?php
session_start();
include("database.php");

$id=$_SESSION['id_tache'];
$requete=$database->query("SELECT * FROM taches WHERE id= $id");
$row=$requete->fetch(PDO::FETCH_ASSOC);

$titre=$row['titre'];
$priorite=$row['priorite'];
$statut=$row['statut'];
$desc=$row['description'];
$echeance=$row['echeance'];

?>

<form method="post" action="modification.php" class='add-task'>
    <h1>Modifier la tache</h1>
    <label for="task-title">Titre:</label>
    <input type="text" id="task-title" name="task-title" value="<?php echo $titre; ?>">

    <label for="task-priority">Priorité:</label>
    <select id="task-priority" name="task-priority">
        <?php
        $prioriteOptions = ['faible', 'moyenne', 'elevee'];
        foreach ($prioriteOptions as $option) {
            $selected = ($option == $priorite) ? 'selected' : '';
            echo '<option value="' . $option . '" ' . $selected . '>' . $option . '</option>';
        }
        ?>
    </select>

    <label for="task-status">Statut:</label>
    <select id="task-status" name="task-status">
        <?php
        $statutOptions = ['a_faire', 'en_cours', 'terminee'];
        foreach ($statutOptions as $option) {
            $selected = ($option == $statut) ? 'selected' : '';
            echo '<option value="' . $option . '" ' . $selected . '>' . $option . '</option>';
        }
        ?>
    </select>

    <label for="echeance">Echeance:</label>
    <input type="datetime-local" id="echeance" name="echeance" value="<?php echo $echeance; ?>">

    <label for="task-description">Description:</label>
    <textarea id="task-description" name="task-description" rows="4"><?php echo $desc; ?></textarea>

    <input type='submit' name='send' value='modifier' class="button">
</form>


    
