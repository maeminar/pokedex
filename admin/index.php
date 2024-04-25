<?php
//session_start();
// Ce if permet de verifier la connexion, d'un utilisateur
if (!isset($_SESSION["username"])) {
    header("Location: https://localhost/pokedex/login.php");
}

require_once("../utils/databaseManager.php");
$title = "Admin";

include_once("../block/header.php");

$pdo = connectDB();

?>

<div class="container">
    <h1 class="text-center"><?php echo ($title ?? "Default Title") ?></h1>
</div>

<form class="row" method="POST" action="addPokemon.php"></form>
<h2>Ajouter un pokémon</h2>
<label for="addPokemon"></label>
<input type="text" name="addPokemon" id="addPokemon">
<input type="submit" value="Ajouter">



<?php
var_dump($_SESSION);
include_once("../block/footer.php");
?>

//<form action="deletePokemon.php"></form>
<h2>Supprimer un Pokemon</h2>
<label for=""></label>
<input type="text" name="deletePokemon" id="deletePokemon">
<input type="submit" value="Supprimer">

<form action="editPokemon.php"></form>
<h2>Modifier un Pokemon</h2>
<label for=""></label>
<input type="text" name="editPokemon" id="editPokemon">
<input type="submit" value="Modifier">