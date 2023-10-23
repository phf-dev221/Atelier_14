<?php 


$servername = "localhost";
$username = "root";
$password = "Papaf@ll21";
$nomdb = "gestionEntreprise";

try {
    $database = new PDO("mysql:host=$servername;dbname=$nomdb", $username, $password);
    $database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   // echo 'Connexion réussie';
} catch (PDOException $e) {
    echo "Échec : " . $e->getMessage();
}

?>