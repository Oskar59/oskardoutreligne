<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <title>Projets</title>
</head>
<body>
    <!-- En-tête -->
    <header>
        <a id="titre_onglet">Projets</a>
        <div class="current-time">
            <?php date_default_timezone_set('Europe/Paris'); echo date('H:i'); ?>
        </div>
    </header>

    <!-- Fond d'écran -->
    <div class="desktop-background">
        <!-- Fenêtre principale -->
        <div id="draggable-window" class="window">
            <div class="window-header">
                <div class="window-controls">
                    <span class="close"></span>
                    <span class="minimize"></span>
                    <span class="maximize"></span>
                </div>
                <div class="window-title">Projets</div>
            </div>
            <div class="window-content">
                <!-- Contenu principal -->
                <main>
                    <section>
                        <h2>Mes projets</h2>
                        <p>Découvrez mes travaux personnels et professionnels.</p>
                    </section>
                </main>
            </div>
        </div>
    </div>

    <!-- Dock de navigation -->
    <footer class="dock">
        <ul>
            <li><a href="index.php"><img src="images/home.png" alt="Accueil"></a></li>
            <li><a href="cours.php"><img src="images/open-book.png" alt="Cours"></a></li>
            <li><a href="projets.php"><img src="images/project.png" alt="Projets"></a></li>
            <li><a href="contact.php"><img src="images/contact.png" alt="Contact"></a></li>
            <li><a href="login.php"><img src="images/lock.png" alt="Section sécurisée"></a></li>
        </ul>
    </footer>

    <!-- Script -->
    <script src="js/script.js"></script>
</body>
</html>
