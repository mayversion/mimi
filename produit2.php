<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Découvrez les meilleures offres sur une large gamme de produits avec jusqu'à 70% de réduction. Livraison disponible partout en Algérie.">
    <meta name="keywords" content="shopping, e-commerce, soldes, réductions, mode, produits, achats en ligne, Algérie">

    <title>May ecom website</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"/>

</head>
<body>
   
    <section id="header">
        <a href="#"><img src="assets/images/mimi_logo.png" class="logo"></a>
        <div>
            <ul id="navbar">
                <li><a  href="index.php">Home</a></li>
                <li><a href="shop.php" class="active">Shopping</a></li>
                <li><a href="signup.php">SignUp</a></li>
                
                <li><a href="contact.php">Contact</a></li>
                <li id="lg-bag"><a href="cart.php"><i class="fa-solid fa-store"></i></a></li>
                <a href="#" id="close"><i class="far fa-times"></i></a>
            </ul>
    
        </div>
        <div class="mobile">
            <a href="cart.php"><i class="fa-solid fa-store"></i></a>
            <i class="fas fa-outdent" id="bar"></i>
            
        </div>
      
    </section>

    <?php
require_once "includes/dbh.inc.php";

$row = null;
$row1 = null;

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = intval($_GET['id']);
    $select = $pdo->prepare('SELECT * FROM vetement WHERE id=?');
    $select->execute([$id]);
    $row = $select->fetch(PDO::FETCH_OBJ);

    $select1 = $pdo->prepare('SELECT * FROM description WHERE id=?');
    $select1->execute([$id]);
    $row1 = $select1->fetch(PDO::FETCH_OBJ);
}

if ($row) {
    echo '<section id="pro-details" class="section-p1">
        <div class="single-pro-image">
            <img src="' . htmlspecialchars($row->image1) . '" width="100%" id="main-image">
            <div class="small-img-group">
                <div class="small-img-col">
                    <img src="' . htmlspecialchars($row->image1) . '" width="100%" class="small-img" alt="">
                </div>
                <div class="small-img-col">
                    <img src="' . htmlspecialchars($row->image2) . '" width="100%" class="small-img" alt="">
                </div>
                <div class="small-img-col">
                    <img src="' . htmlspecialchars($row->image3) . '" width="100%" class="small-img" alt="">
                </div>
                <div class="small-img-col">
                    <img src="' . htmlspecialchars($row->image4) . '" width="100%" class="small-img" alt="">
                </div>
            </div>
        </div>
        <div class="single-pro-details">
            <h6 id="titre">' . htmlspecialchars($row->genre) . '</h6>
            <h4>' . htmlspecialchars($row->title) . '</h4>
            <h2 id="prix">' . htmlspecialchars($row->price) . ' DA</h2>
            
            
            
            <form action="cart.php" method="POST" onsubmit="return validateForm()">
                <select id="size" name="size">
                    <option value="1">Select Size</option>
                    <option value="2">S</option>
                    <option value="3">M</option>
                    <option value="4">L</option>
                    <option value="5">XL</option>
                    <option value="6">XXL</option>
                    <option value="7">XXXL</option>
                </select>
                <input type="hidden" name="id" value="'.$row->id.'">

                <button type="submit" class="normal">Ajouter au panier</button>
                <input type="number" value="1" name="quantite" min="1">




            
                
            </form>

           
            <h4>Product Details</h4>
            <span>' . ($row1 ? htmlspecialchars($row1->description) : 'No description available.') . '</span>
        </div>
    </section>';
} else {
    echo '<p>Product not found.</p>';
}
?>

   
    
    <?php
require_once "includes/dbh.inc.php";

$select = $pdo->prepare('SELECT * FROM vetement where id<5');
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

       
    <section id="newsletter" class="section-p1 section-m1">
        <div class="newstext">
            <h4>Sign Up For Newsletters</h4>
            <p>Get E-msail updates about our latest shop and <span>special offers</span></p>
        </div>
        <div class="form">
            <input type="text" placeholder="Enter Your Email">
            <button class="normal">Subscribe</button>

        </div>
   
    </section>

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
                    <i class="fab fa-facebook-f"></i>
                    <i class="fab fa-instagram"></i>
                    <i class="fab fa-twitter"></i>
                    <i class="fab fa-youtube"></i>
                </div>
            </div>
        </div>
        <div class="col">
            <h4>About</h4>
            <a href="#">About Us</a>
            <a href="#">Delivery Info</a>
            <a href="#">Privacy Policy</a>
            <a href="#">Termes & onditions</a>
            <a href="#">Contact Us</a>
        </div>
        <div class="col">
            <h4>My Account</h4>
            <a href="#">Sign In</a>
            <a href="#">View Cart</a>
            <a href="#">MY Wishlist</a>
            <a href="#">Track My Order</a>
            <a href="#">Help</a>
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
            <p>Copyright © 2024 Mimi. All Rights Reserved</p>
            <p>Terms & Conditions | Privacy Policy</p>
        </div>
       
    </footer>
    <script>
        var MainImg=document.getElementById("main-image");
        var smallimg=document.getElementsByClassName("small-img");

        smallimg[0].onclick=function(){
            MainImg.src =smallimg[0].src;
        }
        smallimg[1].onclick=function(){
            MainImg.src =smallimg[1].src;
        }
        smallimg[2].onclick=function(){
            MainImg.src =smallimg[2].src;
        }
        smallimg[3].onclick=function(){
            MainImg.src =smallimg[3].src;
        }

    </script>
    
    
    <script src="script.js"></script>
</body>
</html>