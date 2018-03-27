<?php
require_once 'functions.php';
require_once 'model/database.php';
$id = $_GET["id"];

$photo = getPhoto($id);
$liste_tags = getAllTagsByPhoto($id);

getheader($photo["titre"], "Page des photos Jean Webdesign");
?>

<header>
    <div class="row col_center">
<?php getmenu(); ?>
    </div>
</header>

<main class="row col_center">

<h1><?php echo $photo["titre"]?></h1>

<img src="images/<?php echo $photo["image"]; ?>">

<ul>
    <?php foreach ($liste_tags as $tag) : ?>
        <li># <?php echo $tag["libelle"] ?></li>
    <?php endforeach; ?>
</ul>

</main>

<?php getfooter(); ?>
