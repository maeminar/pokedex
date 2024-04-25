<?php
require_once("utils/connectDB.php");
$title = "Pokedex !";

$passHash = password_hash("admin", PASSWORD_DEFAULT);
echo($passHash);

var_dump(password_verify("admin","$passHash"));

//inclure le header//
include_once("block/header.php");
?>

<div class="container">
    <h1 class="text-center"><?php echo ($title) ?></h1>
</div>

<?php

//connection à la base de données//
$pdo = connectDB();
configPDO($pdo);

//requête SQL pour récupérer toutes les entrées de la table pokedex de la base de données, puis on stocke les résultats dans la variable $pokemons.//
$reponse = $pdo->query('SELECT * FROM pokedex');
$pokemons = $reponse->fetchAll();

?>

<div class="container">
    <div class="d-flex justify-content-around  align-items-center flex-wrap gap-6">
<?php 
//parcourir chaque Pokémon récupéré de la base de données//
foreach ($pokemons as $pokemon) {  
    ?>
        <div class="col-4 border border-dark border-2 rounded  bg-warning-subtle text-center">
            <img src="<?php echo $pokemon['image'];?>" class="img-fluid">
            <p>Nom : <?php echo $pokemon['nameFr']; ?></p>
            <p>ID : <?php echo $pokemon['id']; ?></p>
            <a href="pokemon-detail.php?id=<?php echo $pokemon['id']; ?>">Plus de détails</a>
        </div>
 <?php   
} 
?>
    </div>
</div>

<?php
//inclure le footer//
include_once("block/footer.php");
?>