<?php
session_start();

// Vérifie si l'utilisateur est déjà connecté
if (empty($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    // Redirige vers la page de connexion si non authentifié
    header('Location: login.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Section sécurisée">
    <title>Oskar Doutreligne - Section Sécurisée</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <?php include 'header.php'; ?>
    <main>
        <section id="secure">
            <h2>Section Sécurisée</h2>
            <p>Bienvenue dans la section protégée du site.</p>
            <p>Vous êtes authentifié avec succès.</p>
            <a href="logout.php" class="logout-link">Déconnexion</a>
        </section>
    </main>
    <?php include 'footer.php'; ?>
</body>
</html>
