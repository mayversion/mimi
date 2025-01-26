<?php
session_start(); 

require_once "includes/dbh.inc.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['coupon'])) {
    $coupon = trim($_POST['coupon']);

    if (strcasecmp($coupon, "DISCOUNT10") === 0) {
        $_SESSION['discount'] = 10.00;
        echo "<script>alert('Coupon DISCOUNT10 appliqué avec succès !');</script>";
    } elseif (strcasecmp($coupon, "SALE20") === 0) {
        $_SESSION['discount'] = 20.00;
        echo "<script>alert('Coupon SALE20 appliqué avec succès !');</script>";
    } else {
        unset($_SESSION['discount']); 
        echo "<script>alert('Coupon invalide !');</script>";
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'], $_POST['size'], $_POST['quantite'])) {
    $id = intval($_POST['id']);
    $size = $_POST['size'];
    $quantite = intval($_POST['quantite']);

    if ($quantite <= 0 || $size == "1") {
        echo "Veuillez sélectionner une taille valide et une quantité supérieure à zéro.";
        exit;
    }

    $query = $pdo->prepare("SELECT * FROM vetement WHERE id = ?");
    $query->execute([$id]);
    $product = $query->fetch(PDO::FETCH_OBJ);

    if ($product) {
        $produit = [
            'id' => $product->id,
            'name' => $product->title,
            'price' => floatval($product->price),
            'size' => $size,
            'quantity' => $quantite,
            'image' => $product->image1
        ];

        $cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];

        $productFound = false;
        foreach ($cart as &$item) {
            if ($item['id'] == $produit['id'] && $item['size'] == $produit['size']) {
                $item['quantity'] += $produit['quantity'];
                $productFound = true;
                break;
            }
        }

        if (!$productFound) {
            $cart[] = $produit;
        }

        $_SESSION['cart'] = $cart;
    } else {
        echo "Produit non trouvé.";
    }
}

if (isset($_GET['remove'], $_GET['id'], $_GET['size'])) {
    $id = intval($_GET['id']);
    $size = $_GET['size'];

    if (isset($_SESSION['cart'])) {
        $cart = $_SESSION['cart'];

        foreach ($cart as $index => $item) {
            if ($item['id'] == $id && $item['size'] == $size) {
                unset($cart[$index]);
                break;
            }
        }

        $_SESSION['cart'] = array_values($cart);
    }
}

$total = 0;
if (isset($_SESSION['cart'])) {
    foreach ($_SESSION['cart'] as $item) {
        $subtotal = $item['price'] * $item['quantity'];
        $total += $subtotal;
    }
}

$discount = $_SESSION['discount'] ?? 0;
$grandTotal = $total - $discount;
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
        <li><a href="shop.php">Shopping</a></li>
        <li><a href="signup.php">SignUp</a></li>
        <li><a href="contact.php">Contact</a></li>
        <li id="lg-bag"><a href="cart.php" class="active"><i class="fa-solid fa-store"></i></a></li>
    </ul>
</section>
<section id="page-header">
        
        <h2>#let's_talk</h2>
       
        <p>LEAVE A MESSAGE ,We love to hear from you!</p>
    </section>

<section id="cart" class="section-p1">
    <table width="100%">
        <thead>
        <tr>
            <td>Remove</td>
            <td>Image</td>
            <td>Product</td>
            <td>Price</td>
            <td>Quantity</td>
            <td>Subtotal</td>
        </tr>
        </thead>
        <tbody>
        <?php if (!empty($_SESSION['cart'])): ?>
            <?php foreach ($_SESSION['cart'] as $item): ?>
                <tr>
                    <td>
                        <a href="cart.php?remove=1&id=<?= htmlspecialchars($item['id']) ?>&size=<?= htmlspecialchars($item['size']) ?>">
                            <i class="fas fa-trash-alt"></i>
                        </a>
                    </td>
                    <td><img src="<?= htmlspecialchars($item['image']) ?>" alt="Product Image" width="100px"></td>
                    <td><?= htmlspecialchars($item['name']) ?></td>
                    <td><?= number_format($item['price'], 2) ?> DA</td>
                    <td><?= htmlspecialchars($item['quantity']) ?></td>
                    <td><?= number_format($item['price'] * $item['quantity'], 2) ?> DA</td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="6">Votre panier est vide.</td>
            </tr>
        <?php endif; ?>
        </tbody>
    </table>
</section>

<section id="cart-add" class="section-p1">
    <div id="coupon">
        <h3>Apply Coupon</h3>
        <form action="cart.php" method="POST">
            <input type="text" name="coupon" placeholder="Enter Your Coupon" required>
            <button type="submit" class="normal">Apply Coupon</button>
        </form>
    </div>
    <div id="subtotal">
        <h3>Cart Totals</h3>
        <table>
            <tr>
                <td>Cart Subtotal</td>
                <td><?= number_format($total, 2) ?> DA</td>
            </tr>
            <tr>
                <td>Discount</td>
                <td><?= number_format($discount, 2) ?> DA</td>
            </tr>
            <tr>
                <td>Total</td>
                <td><strong><?= number_format($grandTotal, 2) ?> DA</strong></td>
            </tr>
        </table>
    </div>
</section>

</body>
<footer class="section-p1">
        <div class="col">
            <img src="assets/images/mimi_logo.png" class="logo">
            <h4>Contact</h4>
            <p> <strong>Address:</strong>AddressAlgerie ,Alger Usthb</p>
            <p> <strong>Phone:</strong> +213 0542-40-63-36</p>
            <p> <strong>Hours:</strong> 10:00 - 18:00 , Dimanche - Jeudi</p>
            <div class="follow">
                <h4>Follow us</h4>
                <div class="icon">
                    <a href="https://www.facebook.com/usthbspottedusthb" target="_blank"><i class="fab fa-facebook-f"></i></a>
                    <a href="https://www.instagram.com/_maaaayyy_mimi/" target="_blank">
                        <i class="fab fa-instagram"></i>
                    </a>

                    <a href="https://x.com/elonmusk" target="_blank"><i class="fab fa-twitter"></i></a>
                    <a href="https://www.youtube.com/@usthb5708" target="_blank"><i class="fab fa-youtube"></i></a>
                </div>
            </div>
        </div>
        <div class="col">
            <h4>About</h4>
            
            <a href="#">Delivery Info</a>
            <a href="#">Privacy Policy</a>
            <a href="#">Termes & onditions</a>
            <a href="contact.php">Contact Us</a>
        </div>
        <div class="col">
            <h4>My Account</h4>
            <a href="signup.php">Sign In</a>
            <a href="cart.php">View Cart</a>
            <a href="#">MY Wishlist</a>
            <a href="cart.php">Track My Order</a>
            <a href="contact.php">Help</a>
        </div>
        <div class="col install">
            <h4>Install App</h4>
            <p>From App Store or Google Play</p>
            <div class="row">
                <img src="assets/images/Paiement/app.jpg" alt="playstore">
                <img src="assets/images/Paiement/play.jpg" alt="appstore">
                <p>Secured Payment Gateways</p>
                <img src="assets/images/Paiement/pay.png" >
            </div>

        </div>
        <div class="copyright">
            <p>Copyright © 2024 Mehenni May . All Rights Reserved</p>
            <p>Terms & Conditions | Privacy Policy</p>
        </div>
       
    </footer>
</html>

