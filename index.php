<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Spotifree</title>
    <meta charset="UTF-8">
    <link rel="icon" href="iconPalette.png">
    <link rel="stylesheet" href="src/styles/main.css">
</head>
<body class="flex flex-col items-center h-screen bg-gradient-to-r from-maximumRed via-maximumYellowRed to-lemonMeringue">
    <header class="flex flex-row flex-wrap items-center justify-center w-screen h-1/6 bg-prussianBlue
        border-lemonMeringue border-b-2 rounded-b-md">
        <img src="iconPalette.png" alt="icone du site">
        <h1 class="text-6xl text-lemonMeringue font-bold">Bienvenue sur Spotifree</h1>
    </header>
    <main class="flex flex-col h-full w-3/6 justify-center">
        <div class="flex flex-col text-lemonMeringue text-center bg-prussianBlue space-y-8 h-4/6 justify-center items-center border-lemonMeringue
            border-double border-4 rounded-md font-bold">
            <h2 class="text-4xl">Pas encore de compte ?</h2>
            <a href="index.php?action=register" class="border-2 border-orange rounded-md w-3/6 hover:text-lemonMeringue hover:bg-maximumRed
            bg-lemonMeringue text-maximumRed text-2xl">S'inscrire</a>
            <h2 class="text-4xl">Déjà un compte ?</h2>
            <a href="index.php?action=login" class="border-2 border-orange rounded-md w-3/6 hover:text-lemonMeringue hover:bg-maximumRed
            bg-lemonMeringue text-maximumRed text-2xl">Se connecter</a>
        </div>
    </main>
    <footer class="flex flex-row space-x-2 bottom-0 h-12 text-center bg-prussianBlue w-screen justify-center items-center
        border-lemonMeringue border-t-2 rounded-t-md">
        <h3 class="text-2xl text-lemonMeringue">Site créé par</h3>
        <a href="https://github.com/Timeuh" class="text-2xl text-lemonMeringue hover:text-maximumRed font-bold">Timeuh</a>
</body>
</html>