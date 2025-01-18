<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css?v=3">
    <title>Site Vitrine MacOS</title>
</head>
<body>
    <!-- En-tête -->
    <header>
        <div id="titre_onglet">Accueil</div>
        <div class="current-time">10:45</div> <!-- Exemple d'heure -->
    </header>

    <!-- Fond d'écran -->
    <div class="desktop-background">
        <!-- Fenêtre principale -->
        <div id="draggable-window" class="window">
            <div class="window-header">
                <div class="window-controls" role="toolbar">
                    <span class="close" aria-label="Fermer"></span>
                    <span class="minimize" aria-label="Minimiser"></span>
                    <span class="maximize" aria-label="Maximiser"></span>
                </div>
                <div class="window-title">Accueil</div>
            </div>
            <div class="window-content">
                <main>
                    <section id="accueil">
                        <h2>Bienvenue sur mon site</h2>
                        <p>Explorez mes projets, mes cours, et contactez-moi facilement grâce à cette interface inspirée de MacOS.</p>
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

    <script src="js/script.js"></script>
</body>
</html>
