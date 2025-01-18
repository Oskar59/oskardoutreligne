<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Contact</title>
</head>
<body>
    <!-- En-tête -->
    <header>
        <div id="titre_onglet">Contact</div>
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
                <div class="window-title">Contact</div>
            </div>
            <div class="window-content">

                <!-- Contenu principal -->
                <main>
                    <section>
                        <h2>Me contacter</h2>
                        <form>
                            <label for="name">Nom :</label>
                            <input type="text" id="name" name="name" required>

                            <label for="email">Email :</label>
                            <input type="email" id="email" name="email" required>

                            <label for="message">Message :</label>
                            <textarea id="message" name="message" required></textarea>

                            <button type="submit">Envoyer</button>
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
