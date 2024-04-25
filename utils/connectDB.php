<?php

function connectDB(): PDO
//Connexion à la BDD. Elle renvoie un objet PDO//
{
    try {

        $host = "localhost";

        $databaseName = "pokemon";
        $user = "root";
        $password = "";

        $pdo = new PDO("mysql:host=" . $host . ";port=3307;dbname=" . $databaseName . ";charset=utf8", $user, $password);

        configPdo($pdo);

        return $pdo;
    } catch (Exception $e) {
        
        //Lancer l'erreur
        //throw $e;

        echo ("Tu fais n'importe quoi : " .  $e->getMessage());

  
        exit();
    }
}

function configPdo(PDO $pdo)
{
    // Recevoir les erreurs PDO ( coté SQL )
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // Choisir les indices dans les fetchs
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
}

function findAllPokemons (PDO $pdo): array
 {
    $reponse = $pdo->query("SELECT * FROM pokemon LIMIT 50 OFFSET 1");
    return $reponse->fetchAll();
}

function findPokemonById (PDO $pdo, int $id): array
//Fonction pour rechercher un pokemon dans la BDD grâce à son ID//
 {
    $reponse = $pdo->prepare("SELECT * FROM pokedex WHERE id = :id");
    $reponse->execute([
            ":id" => $id
    ]
    );
    return $reponse->fetchAll();
}