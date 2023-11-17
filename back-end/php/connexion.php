<?php
$serveur = "localhost";
$utilisateur = "root"; // Nom d'utilisateur de la base de données
$motdepasse = ""; // Mot de passe de la base de données
$nomdelabase = "electro_nacer"; // Nom de la base de données

// Création d'une connexion
$connexion = new mysqli($serveur, $utilisateur, $motdepasse, $nomdelabase);

// Vérification de la connexion
if ($connexion->connect_error) {
    die("Échec de la connexion : " . $connexion->connect_error);
}
// Fermer la connexion (à faire lorsque vous avez terminé)
// $connexion->close();
?>
