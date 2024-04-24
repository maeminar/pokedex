<?php
require_once("connect_bdd.php");

// URL de l'API Tyradex
$url = 'https://tyradex.tech/api/v1/pokemon';

// Récupérer les données depuis l'API
$data = file_get_contents($url);

// Convertir les données JSON en tableau associatif
$pokemonData = json_decode($data, true);


try {
$bdd = connectDB();
$stmt = $bdd->prepare("INSERT INTO Pokemon (name_FR, name_JP, generation, img_default, img_shiny)
VALUES (:name_FR, :name_JP, :generation, :img_default, :img_shiny)");

foreach ($pokemonData as $pokemon) {
$params = array(
':name_FR' => $pokemon['name']['fr'],
':name_JP' => $pokemon['name']['jp'],
':generation' => $pokemon['generation'],
':img_default' => $pokemon['sprites']['regular'],
':img_shiny' => $pokemon['sprites']['shiny'],
);

$stmt->execute($params);
}

echo "Données insérées avec succès dans la base de données.";
} catch (PDOException $e) {
echo "Erreur : " . $e->getMessage();
}
?>