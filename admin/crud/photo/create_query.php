<?php 
require_once '../../security.php';
require_once '../../../model/database.php';

$titre = $_POST["titre"];
$description = $_POST["description"];
$categorie_id = $_POST["categorie_id"];
$tag_ids = isset($_POST["tag_ids"]) ? $_POST["tag_ids"] : [];

//Upload de l'image

$tmp = $_FILES["image"]["tmp_name"]; //emplacement temporaire du fichier uploadé 
$filename = $_FILES["image"]["name"]; //nom du fichier uploadé
move_uploaded_file($tmp, "../../../uploads/" . $filename);


insertPhoto($titre, $filename, $description, $categorie_id, $tag_ids);

header("Location: index.php");