<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Spotifree</title>
    <meta charset="UTF-8">
    <link rel="icon" href="img/icon.png">
    <link rel="stylesheet" href="styles/main.css">
</head>
<body class="flex w-screen h-screen background text-center text-burnt-sienna-200">
<header class="flex flex-lig justify-center items-center background-plate w-1/3 px-12 space-x-8">
    <img src="img/icon.png" alt="icone du site">
    <h1 class="font-bold text-6xl drop-shadow-lg gradient-text">Bienvenue sur Spotifree</h1>
</header>
<main class="w-4/6 background-plate text-3xl">
    <div class="flex flex-col h-4/6 justify-center my-40 space-y-12 text-center">
        <?php
            session_start();
            if($_SERVER['REQUEST_METHOD'] == "GET"){
                if (isset($_GET['state'])){
                    if ($_GET['state'] == "disconnect") : ?><h1 class="text-green-500 text-3xl">Déconnexion réussie</h1>
                        <?php
                        session_destroy();
                    endif;
                    }
                } ?>
        <h2 class="text-4xl">Pas encore de compte ?</h2>
        <a href="pages/register.php" class="link mx-auto">S'inscrire</a>
        <h2 class="text-4xl">Déjà un compte ?</h2>
        <a href="pages/login.php" class="link mx-auto">Se connecter</a>
    </div>
</main>
<footer class="fixed bottom-0 flex flex-lig w-screen justify-center text-3xl py-4">
    <h3 class="px-2">Site créé par</h3>
    <a href="https://github.com/Timeuh" class="link">Timeuh</a>
</footer>
</body>
</html>