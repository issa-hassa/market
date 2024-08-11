<?php
// redimensionne.php
if (isset($_GET['img'])) {
    $imgPath = $_GET['img'];
    $width = 200; // Largeur souhaitée
    $height = 150; // Hauteur souhaitée

    $imgFullPath = $_SERVER['DOCUMENT_ROOT'] . '/images/produits/' . $imgPath;

    if (file_exists($imgFullPath)) {
        $image = imagecreatefromjpeg($imgFullPath);
        $newImage = imagecreatetruecolor($width, $height);

        // Redimensionne l'image
        imagecopyresampled($newImage, $image, 0, 0, 0, 0, $width, $height, imagesx($image), imagesy($image));

        // Envoie l'en-tête pour l'image JPEG
        header('Content-Type: image/jpeg');
        imagejpeg($newImage);
        
        // Libère la mémoire
        imagedestroy($image);
        imagedestroy($newImage);
    } else {
        // Gérer le cas où l'image n'existe pas
        header("HTTP/1.0 404 Not Found");
    }
} else {
    // Gérer le cas où l'image n'est pas spécifiée
    header("HTTP/1.0 400 Bad Request");
}
?>
