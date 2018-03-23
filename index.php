<?php
require_once 'functions.php';
require_once 'model/database.php';
//Déclaration des variables
$liste_photos = getAllPhotos();
//debug($liste_photos, false); /*true pour avoir juste le die (le code s'arrête) et false pour avoir tout le code*/


getheader("Accueil", "Page d'accueil site internet Jean Webdesign", $path = ["css/test.css"]);
?>



<header class="header_home">

    <div id="header_content" class="row col_center">

        <?php getmenu(); ?>

        <h2>Hello! Je suis jean WebDesign</h2>
        <h3>J'aime bidouiller Photoshop</h3>

    </div>

</header>

<main>

    <section id="gallery">
        <div id="gallery_content" class="row col_center flex_wrapper">
            <h2>Dernières photos</h2>

            <?php foreach ($liste_photos as $photos): ?>

                <?php include 'include/photos.inc.php'; ?>

            <?php endforeach; ?>
        </div>

    </section>

    <section id="contact" class="row col_center">

        <h2>Prenons Contact</h2>
        <h3 class="col-10 col_center">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Soluta in provident odio magni rem corporis, non nostrum quae a, perspiciatis voluptatum dolor incidunt porro. Soluta nulla, iure pariatur maxime provident!</h3>

        <a href="contact.php" title="me contacter" class="btn-1 col-2 col_center">Me contacter</a>

    </section>

</main>

<?php getfooter(); ?>