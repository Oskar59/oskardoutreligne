<?php
$baseDir = __DIR__ . DIRECTORY_SEPARATOR . "documents";

if (!is_dir($baseDir)) {
    echo "<p class='error'>Le répertoire principal n'existe pas.</p>";
    exit;
}

$dirs = array_filter(glob($baseDir . DIRECTORY_SEPARATOR . '*'), 'is_dir');
if ($dirs === false) {
    echo "<p class='error'>Erreur lors de la lecture des répertoires.</p>";
    exit;
}

echo '<div class="courses-container">';

foreach ($dirs as $dir) {
    $courseName = htmlspecialchars(basename($dir), ENT_QUOTES, 'UTF-8');
    echo "<div class='course'>";
    echo "<h3 class='course-title'>$courseName</h3>";
    echo "<ul class='file-list'>";

    $files = array_diff(scandir($dir), array('.', '..'));
    if ($files === false) {
        echo "<p class='error'>Erreur lors de la lecture des fichiers dans $courseName.</p>";
        continue;
    }

    foreach ($files as $file) {
        $filePath = 'documents/' . basename($dir) . '/' . $file;
        $filePath = htmlspecialchars($filePath, ENT_QUOTES, 'UTF-8');
        $file = htmlspecialchars($file, ENT_QUOTES, 'UTF-8');
        $ext = pathinfo($file, PATHINFO_EXTENSION);
        $icon = match ($ext) {
            'pdf' => '<i class="fas fa-file-pdf"></i>',
            'docx' => '<i class="fas fa-file-word"></i>',
            'xlsx' => '<i class="fas fa-file-excel"></i>',
            default => '<i class="fas fa-file"></i>',
        };
        echo "<li class='file-item'>$icon <a href='$filePath' target='_blank' class='file-link'>$file</a></li>";
    }

    echo "</ul>";
    echo "</div>";
}

echo '</div>';
?>