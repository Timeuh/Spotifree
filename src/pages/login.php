<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Spotifree</title>
    <meta charset="UTF-8">
    <link rel="icon" href="iconPalette.png">
    <link rel="stylesheet" href="../styles/main.css">
</head>
<body>
    <?php
    if (isset($_GET['state'])){
        $state = $_GET['error'];
        if ($state == "registered") : ?> <h1>Inscription réussie</h1><br>
        <?php endif; } ?>
    <h1>Connexion</h1>
    <form method="post" action="login.php">
        <label>Email
            <input type="email" placeholder="email" name="email" required>
        </label><br>
        <label>Mot de passe
            <input type="password" placeholder="mot de passe" name="password" required>
        </label><br>
        <button type="submit">Connexion</button>
    </form><br><br>
    <a href="../../index.php">Accueil</a>
</body>
</html>