<?php
$serveur = "localhost";
$utilisateur = "root";
$motdepasse = "";
$nomdelabase = "electro_nacer";

$connexion = new mysqli($serveur, $utilisateur, $motdepasse, $nomdelabase);

if ($connexion->connect_error) {
    die("Échec de la connexion : " . $connexion->connect_error);
}
?>
