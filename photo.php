<?php
require_once 'functions.php';
require_once 'model/database.php';
$id = $_GET["id"];

$photo = getPhoto($id);

getheader($photo["titre"], "Page des photos Jean Webdesign");
?>

<header>
    <div class="row col_center">
<?php getmenu(); ?>
    </div>
</header>
<h1><?php echo $photo["titre"]?></h1>

<?php getfooter(); ?>
