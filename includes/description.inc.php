<?php
$dsn = "mysql:host=localhost";
$dbusername = "root";
$dbpassword = "";

try {
    $pdo = new PDO($dsn, $dbusername, $dbpassword);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $pdo->exec("USE may");

    $insertDescriptions = $pdo->prepare("
        INSERT INTO description (vetement_id, description) VALUES
        (1, 'Offrez à votre préadolescente un confort ultime avec ce pantalon de survêtement en tricot. Sa coupe ample et droite assure une liberté de mouvement idéale pour toutes ses activités quotidiennes.'),
        (2, 'Élevez votre style avec ce pull moderne et audacieux de Manfinity Hypemode. Conçu pour l\'homme contemporain, ce pull arbore un motif graphique captivant.'),
        (3, 'Renovez votre garde-robe avec ce pullover moderne et stylé de ROMWE. Conçu pour les hommes, ce pull offre un design audacieux avec des motifs graphiques originaux.'),
        (4, 'Ajoutez une touche de style sauvage à votre garde-robe avec ce sweat-shirt à capuche EZwear. Conçu pour un confort optimal, il est fabriqué en molleton doux et chaud.'),
        (5, 'Adoptez un style élégant et moderne avec ce manteau Cottnline. Conçu avec un col à revers, ce manteau ajoute une touche de sophistication à toute tenue.'),
        (6, 'Parfait pour l\'automne, ce sweat-shirt à capuche DAZY est conçu pour offrir confort et style. En molleton doux et chaud, il assure une chaleur optimale.'),
        (7, 'Renouvelez le look de votre préadolescente avec ces jeans en denim ample et délavé, inspirés de la tendance Y2K.'),
        (8, 'Ce t-shirt à col rond à manches courtes est parfait pour les filles pré-adolescentes. Fabriqué en coton doux, il assure un confort toute la journée.'),
        (9, 'Ajoutez une touche d\'élégance à votre garde-robe avec cette robe longue Clasi. Cintrée à la taille et avec un col en V, cette robe est parfaite pour les occasions spéciales.'),
        (10, 'Cette veste rembourrée en velours côtelé est parfaite pour rester au chaud avec style. Conçue par Manfinity, elle combine confort et tendance.'),
        (11, 'Ce manteau décontracté à col cranté est idéal pour les hommes cherchant à allier confort et style.'),
        (12, 'Ce sweat-shirt à capuche ample et décontracté est parfait pour les adolescentes. Fabriqué en molleton doux, il assure un confort optimal.'),
        (13, 'Cette robe léopard confortable et élégante est parfaite pour les filles. Conçue pour allier style et confort.'),
        (14, 'Ces chaussettes pour enfants sont parfaites pour un style collège. Fabriquées en coton doux, elles assurent confort et durabilité.'),
        (15, 'Cette doudoune à capuche longue est parfaite pour les femmes cherchant à rester au chaud tout en étant élégantes.'),
        (16, 'Cette veste longue matelassée sans manches est idéale pour les femmes cherchant à allier style et confort.')
    ");
    
    $insertDescriptions->execute();
    
    echo "Descriptions insérées avec succès.";

} catch (PDOException $e) {
    echo "Erreur de connexion : " . $e->getMessage();
}
?>
