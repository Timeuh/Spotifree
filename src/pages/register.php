<!DOCTYPE html>
<html lang="fr">
<head>
  <title>Spotifree</title>
  <meta charset="UTF-8">
  <link rel="icon" href="iconPalette.png">
  <link rel="stylesheet" href="../styles/main.css">
</head>
<body>
    <h1>Inscription</h1>
    <form method="post" action="register.php">
        <label>Email
            <input type="email" placeholder="email" name="email" required>
        </label><br>
        <label>Mot de passe
            <input type="password" placeholder="mot de passe" name="password" required>
        </label><br>
        <label>Répéter le mot de passe
            <input type="password" placeholder="répéter le mot de passe" name="repeat" required>
        </label><br>
        <button type="submit">Confirmer</button>
    </form><br><br>
    <a href="../../index.php">Accueil</a>
</body>
</html>