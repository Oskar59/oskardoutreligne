<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css?v=3">
    <title>Liste des cours</title>
</head>
<body>
    <!-- En-tête -->
    <header>
        <a id="titre_onglet">Cours</a>
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
                <div class="window-title">Cours</div>
            </div>
            <div class="window-content">

                <!-- Contenu principal -->
                <main>
                    <section>
                        <h2>Mes cours</h2>
                        <p>Explorez les documents et projets liés à mes formations.</p>
                        <div class="courses-container">
                            <?php
                            $baseDir = __DIR__ . DIRECTORY_SEPARATOR . "documents";

                            if (is_dir($baseDir)) {
                                $dirs = array_filter(scandir($baseDir), function($item) use ($baseDir) {
                                    return is_dir($baseDir . DIRECTORY_SEPARATOR . $item) && $item !== '.' && $item !== '..';
                                });

                                foreach ($dirs as $dir) {
                                    $courseName = htmlspecialchars($dir, ENT_QUOTES, 'UTF-8');
                                    echo "<div class='course'>";
                                    echo "<h3 class='course-title' data-folder='$courseName'><span class='toggle-icon'>▶</span> $courseName</h3>";
                                    echo "<ul class='file-list'></ul>";
                                    echo "</div>";
                                }
                            } else {
                                echo "<p class='error'>Le répertoire 'documents' n'existe pas.</p>";
                            }
                            ?>
                        </div>
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
    <script>
        // Chargement des dossiers et fichiers
        document.addEventListener('DOMContentLoaded', () => {
            document.querySelectorAll('.course-title').forEach(title => {
                title.addEventListener('click', handleFolderClick);
            });
        });

        async function handleFolderClick() {
            const folder = this.getAttribute('data-folder');
            const container = this.nextElementSibling;
            const toggleIcon = this.querySelector('.toggle-icon');

            if (container.classList.contains('loaded')) {
                const isHidden = container.style.display === 'none';
                container.style.display = isHidden ? 'block' : 'none';
                toggleIcon.textContent = isHidden ? '▼' : '▶';
                return;
            }

            try {
                const response = await fetch(`load_folder.php?folder=${encodeURIComponent(folder)}`);
                const data = await response.json();

                if (data.error) {
                    alert(data.error);
                    return;
                }

                data.forEach(item => {
                    if (!container.querySelector(`[data-folder="${item.path}"]`)) {
                        const element = document.createElement('li');
                        element.classList.add(item.type === 'folder' ? 'folder' : 'file');
                        element.innerHTML = item.type === 'folder'
                            ? `<span class="folder-name" data-folder="${item.path}">${item.name} <span class="toggle-icon">▶</span></span><ul class='file-list'></ul>`
                            : `<a href="documents/${item.path}" target="_blank">${item.name}</a>`;
                        container.appendChild(element);

                        if (item.type === 'folder') {
                            element.querySelector('.folder-name').addEventListener('click', handleFolderClick);
                        }
                    }
                });

                container.classList.add('loaded');
                container.style.display = 'block';
                toggleIcon.textContent = '▼';
            } catch (err) {
                console.error('Erreur:', err);
            }
        }
    </script>
</body>
</html>
