<?php

require_once 'config/parameters.php';

$connection = new PDO("mysql:host=" . $db_host . ";dbname=" . $db_name, $db_user, $db_pass, [
    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8', lc_time_names = 'fr_FR';",
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_EMULATE_PREPARES => false
        ]);

function getAllPhotos(): array {
    global $connection;

    $query = "SELECT
                photo.id,
                photo.titre,
                photo.image,
                photo.date_creation,
                date_format(date_creation,'%e %M %Y') AS 'date_creation_format',
                photo.nb_likes,
                categorie.libelle AS categorie
            FROM photo
            INNER JOIN categorie ON categorie.id = photo.categorie_id
            ORDER BY photo.date_creation DESC
            LIMIT 3;";
    
    $stmt = $connection->prepare($query);
    $stmt->execute();
    
    return $stmt->fetchAll();
}

function getPhoto(int $id):array {
    global $connection;
    
    $query = "SELECT
                id,
                titre,
                image,
                date_creation,
                date_format(date_creation,'%e %M %Y') AS 'date_creation_format',
                nb_likes,
                description
            FROM photo
            WHERE id = :id;";
            
    $stmt = $connection->prepare($query);
    $stmt->bindParam(":id", $id);
    $stmt->execute();
    
    return $stmt->fetch();
}


function getAllTagsByPhoto(int $id): array{
    global $connection;
    
    $query = "SELECT
                tag.id,
                tag.libelle
            FROM tag
            INNER JOIN photo_has_tag ON tag.id = photo_has_tag.tag_id
            WHERE photo_has_tag.photo_id = :id;";
    
    $stmt = $connection->prepare($query);
    $stmt->bindParam(":id", $id);
    $stmt->execute();
    
    return $stmt->fetchAll();
}