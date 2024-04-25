<?php 
require_once("utils/connectDB.php");
include_once("block/header.php");
?>

<div class="container">
    <div class="d-flex justify-content-evenly align-items-center flex-wrap gap-4">

    <?php 
if(isset($_GET["id"]) === false) {
    header("http://localhost/pokedex/index.php");
}

$pdo = connectDB();

$id = $_GET["id"];
$pokemons = findPokemonById ($pdo, $id);

foreach ($pokemons as $pokemon) {  
    ?>
        <div class="col-4 border border-dark border-2 rounded  bg-warning-subtle text-center">
            <h1>Détails du pokemon <?php echo $pokemon['nameFr']; ?> </h1>
            <img src="<?php echo $pokemon['image'];?>" class="img-fluid">
            <p>ID : <?php echo $pokemon['id']; ?></p>         
            <p>Nom anglais :<?php echo $pokemon['nameJp']; ?></p>
            <p>Génération : <?php echo $pokemon['generation']; ?></p>
            <p>Sa catégorie : <?php echo $pokemon['category']; ?></p>
            <p>Sa taille :<?php echo $pokemon['height']; ?></p>
            <p>Son poids :<?php echo $pokemon['weight']; ?></p>
            <img src="<?php echo $pokemon['imageShiny'];?>" class="img-fluid">
            <a href="index.php">Retour à la liste des pokemons</a>
        </div>
    <?php   
    } 
    ?>

    </div>
</div>