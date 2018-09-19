<?php
require_once 'functions.php';
require_once 'model/database.php';

$id = $_GET["id"];
$categorie = getEntity("categorie", $id);
$liste_photos = getAllPhotosByCategorie($id);

getheader($categorie["libelle"], "Une catégorie Jean Webdesign");
?>

<header>
    <div class="row col_center">
        <?php getmenu(); ?>
    </div>
</header>
<h1><?php echo $categorie["libelle"]; ?></h1>

<section id="gallery_content" class="row col_center flex_wrapper">
    <?php foreach ($liste_photos as $photos) : ?>;
        <?php include 'include/photos.inc.php'; ?>
    <?php endforeach; ?>
</section>

<?php getfooter(); ?>