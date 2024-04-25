<?php
require_once("utils/connectDB.php");
$title = "Login";

// var_dump(password_verify("admin", $passHash));

$errors = [];

// est ce que j'ai validé le form (obligatoire)
if (
    $_SERVER["REQUEST_METHOD"] === "POST" &&
    isset($_POST["username"], $_POST["password"])
) {
    $pdo = connectDB();
    //Est ce qu'un compte avec le username ET le MDP existe
    $query = $pdo->prepare('SELECT username, password FROM utilisateur WHERE username = :username AND password = :password');
    $query->execute([
        ":username" => $_POST["username"],
        ":password" => $_POST["password"]
    ]);
    //Pour récupérer les données :(fetchAll si plusieurs données à récupérer ou fetch si une seule donnée à récupérer)
    $user = $query->fetch();

    //SI User trouvé, sinon fetch renvoie FALSE
    if ($user !== false) {

        //Verifier les mots de passes
       // if (password_verify($_POST["password"], $user["password"])) {
            //Session save
            session_start();

            $_SESSION["username"] = $_POST["username"];

            header("Location: https://localhost/pokedex/admin.php");
        }
        elseif {
            $errors["global"] = "Identifiants invalides";
        }
        else {
        $errors["global"] = "Identifiants manquants";
    }
    }

include_once("block/header.php");
?>

<div class="container">
    <h1 class="text-center m-3"><?php echo ($title) ?></h1>

    <form method="POST" action="login.php">

        <label for="username">Username</label>
        <input type="text" name="username" id="username">
        <label for="password">Password</label>
        <input type="text" name="password" id="password">

        <?php
        if (isset($errors["global"])) {
            echo ("<p class='text-danger'>" .
                $errors["global"] . "</p>");
        }
        ?>

        <input type="submit" value="Valider">
    </form>

</div>



<?php
include_once("block/footer.php");
?>