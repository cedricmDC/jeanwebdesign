<?php
require_once '../../../model/database.php';

$id = $_GET["id"];
$categorie = getEntity("categorie", $id);

require_once '../../layout/header.php'; ?>

<h1>Modifictaion d'une Catégorie </h1>

<form action="update_query.php" method="POST">
    <div class="form-group">
        <label> Titre </label>
        <input type="text" name="libelle" value="<?php echo $categorie['libelle']; ?>" placeholder="Titre" class="form-control">
    </div>
    <input type="hidden" name="id" value="<?php echo $id; ?>">
    <button class="btn btn-success">
        <i class="fa fa-check"></i>
        Enregistrer
    </button>



</form>

<?php require_once '../../layout/footer.php'; ?>
