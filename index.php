<?php

$title = "Pokedex";

include_once("block/header.php");
?>

<div class="container">

    <h1 class="text-center"><?php echo ($title ?? "Pokedex!") ?></h1>


</div>

<?php

require_once("utils/connectDB.php");
$title = "pokedex";
include_once("block/header.php");

$pdo = connectDB();
configPDO($pdo);

$reponse = $pdo->query('SELECT * FROM pokedex');
$pokemons = $reponse->fetchAll();

?>


<div class="container bg-dark">
    <div class="d-flex justify-content-evenly align-items-center flex-wrap gap-4">
<?php 
foreach ($pokemons as $pokemon) {  
    ?>
        <div class="col-4 border border-primary border-2 rounded bg-light">
            <img src="<?php echo $pokemon['image'];?>" class="img-fluid">
            <p><?php echo $pokemon['nameFr']; ?></p>
            <p><?php echo $pokemon['id']; ?></p>
        </div>
 <?php   
} 
?>
    </div>
</div>

<?php
include_once("block/footer.php");
?>