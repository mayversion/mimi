<?php 
session_start();
$first_name=isset($_SESSION["first_name"]) ? htmlspecialchars($_SESSION["first_name"]) : '';
$last_name=isset($_SESSION["last_name"]) ? htmlspecialchars($_SESSION["last_name"]) : '';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Découvrez les meilleures offres sur une large gamme de produits avec jusqu'à 70% de réduction. Livraison disponible partout en Algérie.">
    <meta name="keywords" content="shopping, e-commerce, soldes, réductions, mode, produits, achats en ligne, Algérie">

    <title>May ecom website</title>
    <link rel="stylesheet" href="assets/css/style.css?v=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"/>

</head>

    
       
    
   
    <section id="header">
        <a href="#"><img src="assets/images/mimi_logo.png" class="logo"></a>
        <form method="GET" action="index.php">
            <input type="text" name="search" placeholder="Rechercher un produit...">
            <button type="submit">Rechercher</button>
        </form>
       
        <div>
            <ul id="navbar">
                <li><a class="active" href="index.php">Home</a></li>
                <li><a href="shop.php">Shopping</a></li>
                <li><a href="signup.php">SignUp</a></li>
                
                <li><a href="contact.php">Contact</a></li>
                <?php
                if (!empty($first_name) && !empty($last_name)) {
                    echo '<p class="welcome-message">Bienvenue : ' . htmlspecialchars($first_name . ' ' . $last_name) . '</p>';
                }
                ?>



                <li id="lg-bag"><a href="cart.php"><i class="fa-solid fa-store"></i></a></li>
                <a href="#" id="close"><i class="far fa-times"></i></a>
            </ul>
    
        </div>
        <div class="mobile">
            <a href="cart.php"><i class="fa-solid fa-store"></i></a>
            <i class="fas fa-outdent" id="bar"></i>
            
        </div>
      
    </section>
    
    <section id="hero">
        <h4>Trade-in-offer</h4>
        <h2>Super value deals</h2>
        <h1>On all products</h1>
        <p>Save more with coupons & up to 70% off!</p>
        <button onclick="window.location.href='shop.html';">Shop Now</button>


    </section>
    
    <section id="feature" class="section-p1">
        <div class="fe-box">
            <img src="assets/images/features/f1.png">
            <h6>Livraison 58 wilayas</h6>
        </div>
        <div class="fe-box">
            <img src="assets/images/features/f2.png">
            <h6>Commande en ligne</h6>
        </div>
        <div class="fe-box">
            <img src="assets/images/features/f3.png">
            <h6>Save money</h6>
        </div>
        <div class="fe-box">
            <img src="assets/images/features/f4.png">
            <h6>Reductions</h6>
        </div>
        <div class="fe-box">
            <img src="assets/images/features/f5.png">
            <h6>Happy Sell</h6>
        </div>
        <div class="fe-box">
            <img src="assets/images/features/f6.png">
            <h6>disponible 24/7</h6>
        </div>
    </section>
    <?php
require_once "includes/dbh.inc.php";

$select = $pdo->prepare('SELECT * FROM vetement where id<9 ');
$select->execute();

echo '<section id="product1" class="section-p1">
        <h2>Nouvelle collection</h2>
        <p>La nouvelle collection de l\'été</p>
        <div class="pro-container">';

while ($row = $select->fetch(PDO::FETCH_OBJ)) {
    echo '<div class="pro" onclick="window.location.href=\'produit2.php?id=' . htmlspecialchars($row->id) . '\';">


            <img src="' . htmlspecialchars($row->image1) . '" alt="' . htmlspecialchars($row->title) . '">
            <div class="des">
                <span>' . htmlspecialchars($row->genre) . '</span>
                <h5>' . htmlspecialchars($row->title) . '</h5>
                <div class="star">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <h4>' . htmlspecialchars($row->price) . ' DA</h4>
            </div>
            <a href="cart.php"><i class="fas fa-shopping-cart cart"></i></a>
        </div>';
}

echo '</div>
    </section>';
?>





    
    <section id="banner" class="section-m1">
        <h4>Repair Services </h4>
        <h2>jusqu'a <span>70% de reduction</span> sur les t-shirts et les accesoires</h2>
        <button class="normal" onclick="window.location.href='shop.php'">Explore More </button>

    </section> 

    <?php
require_once "includes/dbh.inc.php";

$select = $pdo->prepare('SELECT * FROM vetement where id >=9 and id<=16');
$select->execute();

echo '<section id="product1" class="section-p1">
        <h2>Nouvelle collection</h2>
        <p>La nouvelle collection de l\'été</p>
        <div class="pro-container">';

while ($row = $select->fetch(PDO::FETCH_OBJ)) {
    echo '<div class="pro" onclick="window.location.href=\'produit2.php?id=' . htmlspecialchars($row->id) . '\';">


            <img src="' . htmlspecialchars($row->image1) . '" alt="' . htmlspecialchars($row->title) . '">
            <div class="des">
                <span>' . htmlspecialchars($row->genre) . '</span>
                <h5>' . htmlspecialchars($row->title) . '</h5>
                <div class="star">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <h4>' . htmlspecialchars($row->price) . ' DA</h4>
            </div>
            <a href="cart.php"><i class="fas fa-shopping-cart cart"></i></a>
        </div>';
}

echo '</div>
    </section>';
?>
    <section id="sm-banner" class="section-p1">
        <div class="banner-box">
            <h4>crazy deals</h4>
            <h2>un produit achete un offert</h2>
            <span>la robe classique la plus glamoure est en vente chez MH</span>
            <button class="white" onclick="window.location.href='shop.php'">Learn More</button>
        </div>
        <div class="banner-box banner-box2">
            <h4>printemps/ete</h4>
            <h2>upcoming season</h2>
            <span>la robe classique la plus glamoure est en vente chez MH</span>
            <button class="white" onclick="window.location.href='shop.php'">Learn More</button>
        </div>
    </section>
    <section id="banner3">
        <div class="banner-box">
           
            <h2>Seasonal Sale</h2>
            <h3>Winter Collection -50% off</h3>
        </div>  
        <div class="banner-box banner-box2">
           
            <h2>Seasonal Sale</h2>
            <h3>Winter Collection -50% off</h3>
        </div>  
        <div class="banner-box banner-box3">
           
            <h2>Seasonal Sale</h2>
            <h3>Winter Collection -50% off</h3>
        </div>    
    </section>
<?php

require_once "includes/dbh.inc.php";

if (isset($_GET['search']) && !empty($_GET['search'])) {
    $search = $_GET['search'];
    $query = 'SELECT DISTINCT * FROM vetement WHERE title LIKE :search';
    $select = $pdo->prepare($query);
    $searchTerm = '%' . $search . '%';
    $select->execute([':search' => $searchTerm]);
    $results = $select->fetchAll(PDO::FETCH_OBJ);

    $displayedProducts = [];
    echo '<section id="product1" class="section-p1">
            <h2>Résultats de recherche pour "' . htmlspecialchars($search) . '"</h2>
            <div class="pro-container">';
    foreach ($results as $product) {
        if (!in_array($product->id, $displayedProducts)) {
            $displayedProducts[] = $product->id;
            echo '<div class="pro" onclick="window.location.href=\'produit2.php?id=' . htmlspecialchars($product->id) . '\';">
                    <img src="' . htmlspecialchars($product->image1) . '" alt="' . htmlspecialchars($product->title) . '">
                    <div class="des">
                        <span>' . htmlspecialchars($product->genre) . '</span>
                        <h5>' . htmlspecialchars($product->title) . '</h5>
                        <div class="star">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <h4>' . htmlspecialchars($product->price) . ' DA</h4>
                    </div>
                    <a href="cart.php"><i class="fas fa-shopping-cart cart"></i></a>
                </div>';
        }
    }

    echo '</div></section>';
} else {
    echo '<section id="product1" class="section-p1">
            <h2>Veuillez entrer un terme de recherche.</h2>
          </section>';
}
?>

    
   
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
   
    <script src="script.js"></script>
</body>
</html>