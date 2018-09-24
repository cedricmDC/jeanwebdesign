<?php
require_once 'functions.php';
require_once 'model/database.php';
$id = $_GET["id"];

$photo = getPhoto($id);
$liste_tags = getAllTagsByPhoto($id);
$liste_commentaires = getAllCommentairesByPhoto($id);

getheader($photo["titre"], "Page des photos Jean Webdesign");
?>

<header>
    <div class="row col_center">
<?php getmenu(); ?>
    </div>
</header>

<main class="row col_center">

<em><?php echo $photo["date_creation_format"];?></em>
<h1><?php echo $photo["titre"]?></h1>

<img src="images/<?php echo $photo["image"]; ?>">


    <?php foreach ($liste_tags as $tag) : ?>
        <p>#<?php echo $tag["libelle"] ?><p>
    <?php endforeach; ?>


<p> <?php echo $photo["description"]; ?></p>
<p><a href="categorie.php?id=<?php echo $photo['categorie_id']; ?>">
      <?php echo $photo["categorie"]; ?></a></p>
<p> <?php echo $photo["nb_likes"]; ?> likes</p>

<section class="commentaires">
    
    <fieldset>
        <legend> Poster un commentaire </legend>
        <form action="insert-commentaire.php" method="POST">
            <textarea name="contenu" placeholder="Votre message"></textarea>
            <input type="hidden" name="photo_id" value="<?php echo $id; ?>">
            <input type="submit">
        </form>
    </fieldset>
    
    <?php foreach ($liste_commentaires as $commentaire) : ?>
        <article>
            <p>Posté le <time><?php echo $commentaire["date_creation"]; ?></time></p>
            <p><?php echo $commentaire["contenu"] ?></p>
        </article>
    <?php endforeach; ?>
</section>

</main>

<?php getfooter(); ?>
