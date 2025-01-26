<?php
require_once "C:/xampp/htdocs/web4/includes/dbh.inc.php";

$genre = isset($_GET['genre']) && $_GET['genre'] !== 'all' ? htmlspecialchars($_GET['genre']) : null;

if ($genre) {
    $select = $pdo->prepare('SELECT * FROM vetement WHERE genre = ?');
    $select->execute([$genre]);
} else {
    $select = $pdo->prepare('SELECT * FROM vetement');
    $select->execute();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Découvrez les meilleures offres sur une large gamme de produits avec jusqu'à 70% de réduction. Livraison disponible partout en Algérie.">
    <meta name="keywords" content="shopping, e-commerce, soldes, réductions, mode, produits, achats en ligne, Algérie">
    <title>Mimi's website</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"/>
</head>
<body>

<section id="header">
    <a href="#"><img src="assets/images/mimi_logo.png" class="logo"></a>
    <ul id="navbar">
        <li><a href="index.php">Home</a></li>
        <li><a href="shop.php" class="active">Shopping</a></li>
        <li><a href="signup.php">SignUp</a></li>
        <li><a href="contact.php">Contact</a></li>
        <li id="lg-bag"><a href="cart.php"><i class="fa-solid fa-store"></i></a></li>
    </ul>
</section>

<section id="page-header">
    <h2>#StayHome</h2>
    <p>Save more with coupons & up to 70% off!</p>
</section>

<section id="filter">
    <form method="GET" action="shop.php">
        <label for="genre">Filtrer par Genre:</label>
        <select name="genre" id="genre">
            <option value="all" <?= !$genre ? 'selected' : '' ?>>Tous</option>
            <option value="Homme" <?= $genre === 'Homme' ? 'selected' : '' ?>>Homme</option>
            <option value="Femme" <?= $genre === 'Femme' ? 'selected' : '' ?>>Femme</option>
            <option value="Enfant" <?= $genre === 'Enfant' ? 'selected' : '' ?>>Enfant</option>
            <option value="Fille" <?= $genre === 'Fille' ? 'selected' : '' ?>>Fille</option>
            <option value="Unisexe" <?= $genre === 'Unisexe' ? 'selected' : '' ?>>Unisexe</option>
        </select>
        <button type="submit">Filtrer</button>
    </form>
</section>

<section id="product1" class="section-p1">
    <h2>Nouvelle collection</h2>
    <p>La nouvelle collection de l'été</p>
    <div class="pro-container">
        <?php while ($row = $select->fetch(PDO::FETCH_OBJ)): ?>
            <div class="pro" onclick="window.location.href='produit2.php?id=<?= htmlspecialchars($row->id) ?>';">
                <img src="<?= htmlspecialchars($row->image1) ?>" alt="<?= htmlspecialchars($row->title) ?>">
                <div class="des">
                    <span><?= htmlspecialchars($row->genre) ?></span>
                    <h5><?= htmlspecialchars($row->title) ?></h5>
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h4><?= number_format($row->price, 2) ?> DA</h4>
                </div>
                <a href="cart.php"><i class="fas fa-shopping-cart cart"></i></a>
            </div>
        <?php endwhile; ?>
    </div>
</section>

<section id="pagination" class="section-p1">
    <a href="shop.php">1</a>
    <a href="shop.php">2</a>
    <a href="shop.php" class="fas fa-long-arrow-alt-right"><i></i></a>
</section>

<footer class="section-p1">
    <div class="col">
        <img src="assets/images/mimi_logo.png" class="logo">
        <h4>Contact</h4>
        <p><strong>Address:</strong> Algerie, Alger, USTHB</p>
        <p><strong>Phone:</strong> +213 0542-40-63-36</p>
        <p><strong>Hours:</strong> 10:00 - 18:00, Dimanche - Jeudi</p>
        <div class="follow">
            <h4>Follow us</h4>
            <div class="icon">
                <i class="fab fa-facebook-f"></i>
                <i class="fab fa-instagram"></i>
                <i class="fab fa-twitter"></i>
                <i class="fab fa-youtube"></i>
            </div>
        </div>
    </div>
</footer>

<script src="script.js"></script>
</body>
</html>
