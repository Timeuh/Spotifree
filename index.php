<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Spotifree</title>
    <meta charset="UTF-8">
    <link rel="icon" href="icon.png">
    <link rel="stylesheet" href="src/styles/main.css">
</head>
<body>
<header>
    <img src="icon.png" alt="icone du site">
    <h1>Bienvenue sur Spotifree</h1>
</header>
<main>
    <div>
        <?php
            session_start();
            if($_SERVER['REQUEST_METHOD'] == "GET"){
                if (isset($_GET['state'])){
                    if ($_GET['state'] == "disconnect") : ?><h1>Déconnexion réussie</h1>
                        <?php
                        session_destroy();
                    endif;
                    }
                } ?>
        <h2>Pas encore de compte ?</h2>
        <a href="src/pages/register.php">
            <span>S'inscrire</span>
        </a>
        <h2>Déjà un compte ?</h2>
        <a href="src/pages/login.php">
            <span>Se connecter</span>
        </a>
    </div>
</main>
<footer>
    <h3>Site créé par</h3>
    <a href="https://github.com/Timeuh">Timeuh</a>
</footer>
</body>
</html>