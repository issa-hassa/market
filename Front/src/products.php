<?php
// Connexion à la base de données
$host = 'localhost'; // ou l'adresse de votre serveur de base de données
$dbname = 'produits';
$username = 'root'; // votre nom d'utilisateur
$password = '1018'; // votre mot de passe

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die('Connection failed: ' . $e->getMessage());
}

// Gestion des filtres et tri
$orderBy = isset($_GET['order']) ? $_GET['order'] : 'prix ASC';
$category = isset($_GET['category']) ? $_GET['category'] : '';
$brand = isset($_GET['brand']) ? $_GET['brand'] : '';

// Construction de la requête SQL avec filtrage
$sql = "SELECT * FROM produits WHERE (:category = '' OR categorie = :category) AND (:brand = '' OR marque = :brand) ORDER BY $orderBy";
$stmt = $pdo->prepare($sql);
$stmt->execute([
    ':category' => $category,
    ':brand' => $brand
]);
$produits = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Récupération des catégories et marques disponibles pour les filtres
$categories = $pdo->query('SELECT DISTINCT categorie FROM produits')->fetchAll(PDO::FETCH_COLUMN);
$brands = $pdo->query('SELECT DISTINCT marque FROM produits')->fetchAll(PDO::FETCH_COLUMN);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Produits</title>
    <link rel="stylesheet" href="../css/styles.css">
    <style>
<style>
    .produit-info {
        display: none;
        position: absolute;
        background: rgba(0, 0, 0, 0.7);
        color: white;
        padding: 10px;
        border-radius: 5px;
        bottom: 10px;
        left: 10px;
        width: calc(100% - 20px);
        text-align: left;
    }
    .produit:hover .produit-info {
        display: block;
    }
    .produits-container {
        display: flex;
        flex-wrap: wrap;
        gap: 1rem;
        justify-content: center;
    }
    .produit {
    width: 300px !important; /* Forcer la largeur */
}

.produit img {
    height: 200px !important; /* Forcer la hauteur de l'image */
}

    .produit {
        width: 300px !important; /* Forcer la largeur */
        position: relative;
        border: 1px solid #ddd;
        border-radius: 8px;
        padding: 1rem;
        width: 300px; /* Augmenter la largeur du conteneur */
        text-align: center;
        background-color: #f9f9f9;
        overflow: hidden;
        /* Assurer que les éléments internes se redimensionnent */
        box-sizing: border-box;
    }
    .produit img {
        height: 200px !important; /* Forcer la hauteur de l'image */
        max-width: 100%;
        height: 200px; /* Définir une hauteur fixe pour les images */
        object-fit: cover; /* Assurer que l'image couvre l'espace sans déformation */
        border-radius: 8px;
        transition: opacity 0.3s;
    }
    .produit:hover img {
        opacity: 0.7;
    }
    /* Styles pour les titres et le texte */
    h1 {
            margin: 20px 0; /* Marge en haut et en bas du titre */
            font-size: 2rem; /* Taille du texte */
            text-align: center; /* Centrer le titre */
        }
        h3 {
            margin-bottom: 20px; /* Marge en bas du texte de bienvenue */
            text-align: center; /* Centrer le texte */
            font-size: 1rem; /* Taille du texte */
        }
        form {
            margin-bottom: 20px; /* Marge en bas du formulaire */
            text-align: center; /* Centrer le formulaire */
        }
        label {
            margin-right: 10px; /* Marge entre les labels et les champs */
        }
        select, button {
            margin-right: 10px; /* Marge entre les champs du formulaire */
        }
</style> 
</head>
<body>
    <?php include '../includes/header.php'; ?>

    <main>
        <h1>Nos Produits</h1>
        <h3>Bienvenue sur la page de nos produits ! <br>Utilisez les filtres ci-dessous pour affiner votre recherche.</h3>

        <form method="GET" action="products.php">
            <label for="order">Trier par prix :</label>
            <select id="order" name="order">
                <option value="prix ASC" <?php if ($orderBy == 'prix ASC') echo 'selected'; ?>>Prix croissant</option>
                <option value="prix DESC" <?php if ($orderBy == 'prix DESC') echo 'selected'; ?>>Prix décroissant</option>
            </select>

            <label for="category"> Catégorie :</label>
            <select id="category" name="category">
                <option value="">Toutes les catégories</option>
                <?php foreach ($categories as $cat): ?>
                    <option value="<?php echo htmlspecialchars($cat); ?>" <?php if ($category == $cat) echo 'selected'; ?>><?php echo htmlspecialchars($cat); ?></option>
                <?php endforeach; ?>
            </select>

            <label for="brand"> Marque :</label>
            <select id="brand" name="brand">
                <option value="">Toutes les marques</option>
                <?php foreach ($brands as $brd): ?>
                    <option value="<?php echo htmlspecialchars($brd); ?>" <?php if ($brand == $brd) echo 'selected'; ?>><?php echo htmlspecialchars($brd); ?></option>
                <?php endforeach; ?>
            </select>

            <button type="submit">Appliquer les filtres</button>
        </form>
        <br>
        <div class="produits-container">
            <?php foreach ($produits as $produit): ?>
                <div class="produit">
                    <img src="<?php echo htmlspecialchars('../images/produits/' . basename($produit['image_url'])); ?>" alt="<?php echo htmlspecialchars($produit['nom']); ?>">

                    <div class="produit-info">
                        <h2><?php echo htmlspecialchars($produit['nom']); ?></h2>
                        <p>Marque : <?php echo htmlspecialchars($produit['marque']); ?></p>
                        <p>Catégorie : <?php echo htmlspecialchars($produit['categorie']); ?></p>
                        <p>Poids : <?php echo htmlspecialchars($produit['poids']); ?></p>
                        <p>Prix : <?php echo htmlspecialchars($produit['prix']); ?> €</p>
                        <p>Provenance : <?php echo htmlspecialchars($produit['provenance']); ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <br>
    </main>

    <?php include '../includes/footer.php'; ?>
</body>
</html>
