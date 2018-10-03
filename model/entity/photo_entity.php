<?php

function getAllPhotos(int $limit = 999): array {
    global $connection;

    $query = "SELECT
                photo.*,
                date_format(date_creation,'%e %M %Y') AS 'date_creation_format',
                categorie.libelle AS categorie
            FROM photo
            INNER JOIN categorie ON categorie.id = photo.categorie_id
            ORDER BY photo.date_creation DESC
            LIMIT :limit;";
    
    $stmt = $connection->prepare($query);
    $stmt->bindParam(":limit", $limit);
    $stmt->execute();
    
    return $stmt->fetchAll();
}

function getPhoto(int $id):array {
    global $connection;
    
    $query = "SELECT
                photo.id,
                photo.titre,
                photo.image,
                photo.date_creation,
                date_format(date_creation,'%e %M %Y') AS 'date_creation_format',
                photo.nb_likes,
                photo.description,
                photo.categorie_id,
                categorie.libelle AS categorie
            FROM photo
            INNER JOIN categorie ON photo.categorie_id = categorie.id
            WHERE photo.id = :id;";
            
    $stmt = $connection->prepare($query);
    $stmt->bindParam(":id", $id);
    $stmt->execute();
    
    return $stmt->fetch();
}

function getAllPhotosByCategorie(int $id): array {
    global $connection;
    
    $query = "SELECT
                photo.*,
                date_format(date_creation,'%e %M %Y') AS 'date_creation_format',
                categorie.libelle AS categorie
            FROM photo
            INNER JOIN categorie ON categorie.id = photo.categorie_id
            WHERE categorie.id = :id
            ORDER BY photo.date_creation DESC;";
    
    $stmt = $connection->prepare($query);
    $stmt->bindParam(":id", $id);
    $stmt->execute();
        
    return $stmt->fetchAll();
}

function insertPhoto(string $titre, string $image, string $description, int $categorie_id, array $tag_ids) {
    global $connection;
    
    $query = "INSERT INTO photo (titre, image, date_creation, nb_likes, description, categorie_id) VALUES ( :titre, :image, NOW(), 0, :description, :categorie_id);";
    
    $stmt = $connection->prepare($query);
    $stmt->bindParam(":titre", $titre);
    $stmt->bindParam(":image", $image);
    $stmt->bindParam(":description", $description);
    $stmt->bindParam(":categorie_id", $categorie_id);
    $stmt->execute();
    
    $id = $connection->lastInsertId();
    
    foreach ($tag_ids as $tag_id) {
        insertPhotoHasTag($id, $tag_id);
    }
}

function insertPhotoHasTag(int $photo_id, int $tag_id) {
    global $connection;
    
    $query = "INSERT INTO photo_has_tag(photo_id, tag_id) VALUES (:photo_id, :tag_id);";
    
    $stmt = $connection->prepare($query);
    $stmt->bindParam(":photo_id", $photo_id);
    $stmt->bindParam(":tag_id", $tag_id);
    $stmt->execute();
}