<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
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
            <li><a href="index.php"><img src="home.png" alt="Accueil"></a></li>
            <li><a href="cours.php"><img src="open-book.png" alt="Cours"></a></li>
            <li><a href="projets.php"><img src="project.png" alt="Projets"></a></li>
            <li><a href="contact.php"><img src="contact.png" alt="Contact"></a></li>
            <li><a href="login.php"><img src="lock.png" alt="Section sécurisée"></a></li>
        </ul>
    </footer>

    <!-- Script -->
    <script src="script.js"></script>
</body>
</html>
