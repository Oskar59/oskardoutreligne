<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css?v=3">
    <title>Connexion</title>
</head>
<body>
    <!-- En-tête -->
    <header>
        <a id="titre_onglet">Connexion</a>
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
                <div class="window-title">Connexion</div>
            </div>
            <div class="window-content">

                <!-- Contenu principal -->
                <main>
                    <section>
                        <h2>Se connecter</h2>
                        <form>
                            <label for="username">Nom d'utilisateur :</label>
                            <input type="text" id="username" name="username" required>

                            <label for="password">Mot de passe :</label>
                            <input type="password" id="password" name="password" required>

                            <button type="submit">Connexion</button>
                        </form>
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
