<?php
session_start();

 
    try {
        
        require_once "dbh.inc.php";
        $insertClothes = $pdo->prepare("INSERT INTO vetement (title, genre, price, created_at, image1, image2, image3, image4) VALUES
        ('Pantalon de survêtement ample et droit en tricot pour préadolescente', 'Fille', 2000, CURRENT_TIMESTAMP, 'produit1_1.png', 'produit1_2.png', 'produit1_3.png', 'produit1_4.png'),
        ('Manfinity Hypemode Homme Pull Avec Motif Graphique Épaule tombante', 'Homme', 3000, CURRENT_TIMESTAMP, 'produit2_1.png', 'produit2_2.png', 'produit2_3.png', 'produit2_4.png'),
        ('ROMWE Street Life Pullover à motif graphique pour homme, école', 'Homme', 2500, CURRENT_TIMESTAMP, 'produit3_1.png', 'produit3_2.png', 'produit3_3.png', 'produit3_4.png'),
        ('EZwear sweat-shirt à capuche en molleton à cordon de serrage avec imprimé léopard et étoile', 'Femme', 4000, CURRENT_TIMESTAMP, 'produit4_1.png', 'produit4_2.png', 'produit4_3.png', 'produit4_4.png'),
        ('Cottnline Manteau Col À Revers Épaule tombante', 'Homme', 5000, CURRENT_TIMESTAMP, 'produit5_1.png', 'produit5_2.png', 'produit5_3.png', 'produit5_4.png'),
        ('DAZY Sweat-shirt à capuche unicolore pour homme, automne', 'Homme', 2500, CURRENT_TIMESTAMP, 'produit6_1.png', 'produit6_2.png', 'produit6_3.png', 'produit6_4.png'),
        ('Jeans en denim ample et délavé tendance Y2K', 'Unisexe', 2500, CURRENT_TIMESTAMP, 'produit7_1.png', 'produit7_2.png', 'produit7_3.png', 'produit7_4.png'),
        ('T-shirt à col rond à manches courtes pour filles pré-adolescentes', 'Fille', 2000, CURRENT_TIMESTAMP, 'produit8_1.png', 'produit8_2.png', 'produit8_3.png', 'produit8_4.png'),
        ('Clasi Robe longue cintrée à la taille avec col en V', 'Femme', 4000, CURRENT_TIMESTAMP, 'produit9_1.png', 'produit9_2.png', 'produit9_3.png', 'produit9_4.png'),
        ('Veste rembourrée épaisse en velours côtelé', 'Homme', 2500, CURRENT_TIMESTAMP, 'produit10_1.png', 'produit10_2.png', 'produit10_3.png', 'produit10_4.png'),
        ('Hypemode Manteau décontracté pour hommes à col cranté', 'Homme', 5000, CURRENT_TIMESTAMP, 'produit11_1.png', 'produit11_2.png', 'produit11_3.png', 'produit11_4.png'),
        ('Veste Sweat-shirt À Capuche Pour Adolescentes, Ample, Décontract', 'Fille', 3000, CURRENT_TIMESTAMP, 'produit12_1.png', 'produit12_2.png', 'produit12_3.png', 'produit12_4.png'),
        ('Robe léopard confortable et élégante pour fille', 'Fille', 1800, CURRENT_TIMESTAMP, 'produit13_1.png', 'produit13_2.png', 'produit13_3.png', 'produit13_4.png'),
        ('1 paire de chaussettes pour enfants style collège double barre mi-mollet', 'Enfant', 700, CURRENT_TIMESTAMP, 'produit14_1.png', 'produit14_2.png', 'produit14_3.png', 'produit14_4.png'),
        ('Doudoune à capuche zippée longue pour femmes', 'Femme', 11000, CURRENT_TIMESTAMP, 'produit15_1.png', 'produit15_2.png', 'produit15_3.png', 'produit15_4.png'),
        ('Veste longue matelassée sans manches à capuche pour femmes', 'Femme', 9000, CURRENT_TIMESTAMP, 'produit16_1.png', 'produit16_2.png', 'produit16_3.png', 'produit16_4.png')
        ");
        
        $insertClothes->execute();

    } catch (PDOException $e) {
        die("Erreur : " . $e->getMessage());
    }

?>
