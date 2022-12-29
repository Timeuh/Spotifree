<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Spotifree</title>
    <meta charset="UTF-8">
    <link rel="icon" href="iconPalette.png">
    <link rel="stylesheet" href="src/styles/main.css">
</head>
<body class="flex flex-col items-center h-screen bg-gradient-to-br from-maximumRed via-maximumYellowRed to-lemonMeringue">
<header class="flex flex-row flex-wrap items-center justify-center w-screen h-1/6 rounded-b-md border-b-2 background-plate">
    <img src="iconPalette.png" alt="icone du site">
    <h1 class="text-6xl text-lemonMeringue font-bold">Bienvenue sur Spotifree</h1>
</header>
<main class="flex flex-col h-full w-3/6 justify-center">
    <div class="flex flex-col text-lemonMeringue text-center space-y-8 h-4/6 justify-center items-center rounded-md border-2 background-plate">
        <?php
            session_start();
            if($_SERVER['REQUEST_METHOD'] == "GET"){
                if (isset($_GET['state'])){
                    if ($_GET['state'] == "disconnect") : ?><h1 class="text-3xl text-green-600">Déconnexion réussie</h1>
            <?php
                        session_destroy();
                    endif;
                    }
                } ?>
        <h2 class="text-4xl">Pas encore de compte ?</h2>
        <a href="src/pages/register.php" class="button-default">
            <span class="button-content">S'inscrire</span>
        </a>
        <h2 class="text-4xl">Déjà un compte ?</h2>
        <a href="src/pages/login.php" class="button-default">
            <span class="button-content">Se connecter</span>
        </a>
    </div>
</main>
<footer class="flex flex-row space-x-2 bottom-0 h-12 text-center w-screen justify-center items-center border-t-2 rounded-t-md background-plate">
    <h3 class="text-2xl text-lemonMeringue">Site créé par</h3>
    <a href="https://github.com/Timeuh" class="text-2xl text-maximumRed hover:text-prussianBlue font-bold">Timeuh</a>
</footer>
</body>
</html>