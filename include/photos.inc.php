<article class="miniature col-4">

    <a href="photo.php?id=<?php echo $photos["id"] ?>" title="<?php echo $photos["titre"] ?>">
        <img src="images/<?php echo $photos["image"]; ?>" alt="photo" title="<?php echo $photos["titre"] ?>">
        <p class="likes"><?php echo $photos["nb_likes"]; ?> likes</p>
    </a>

    <div class="infos">
        <h3><?php echo $photos["titre"] ?> #<?php echo $photos["categorie"] ?></h3>
        <p>
            <?php $liste_tags = getAllTagsByPhoto($photos["id"]); ?>
            <?php foreach ($liste_tags as $tag) : ?>
                #<?php echo $tag["libelle"]; ?>
            <?php endforeach; ?>
        </p>
        <p><?php echo $photos["date_creation_format"]; ?></p>
    </div>

</article>