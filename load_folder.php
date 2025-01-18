<?php
if (isset($_GET['folder'])) {
    $folder = $_GET['folder'];
    $baseDir = __DIR__ . DIRECTORY_SEPARATOR . "documents";

    $fullPath = realpath($baseDir . DIRECTORY_SEPARATOR . $folder);
    if ($fullPath && strpos($fullPath, realpath($baseDir)) === 0 && is_dir($fullPath)) {
        $files = array_diff(scandir($fullPath), ['.', '..']);
        $response = [];

        foreach ($files as $file) {
            $filePath = $folder . DIRECTORY_SEPARATOR . $file;
            $isDir = is_dir($baseDir . DIRECTORY_SEPARATOR . $filePath);
            $response[] = [
                'name' => $file,
                'path' => str_replace(DIRECTORY_SEPARATOR, '/', $filePath), // Chemin formaté pour URL
                'type' => $isDir ? 'folder' : 'file',
            ];
        }

        header('Content-Type: application/json');
        echo json_encode($response);
    } else {
        http_response_code(400);
        echo json_encode(['error' => 'Répertoire non valide ou inaccessible']);
    }
} else {
    http_response_code(400);
    echo json_encode(['error' => 'Aucun répertoire fourni']);
}
?>
