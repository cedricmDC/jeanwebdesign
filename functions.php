<?php
/**
 * Debug la valeur d'une variable
 * @param mixed $var variable à débugger
 * @param bool $die Est ce que le cde doit s'arrêter?
 */
function debug($var, bool $die = true){
    echo '<pre>';
    print_r($var);
    echo'</pre>';
    if($die){
        die;
    }
}

function getheader(string $title, $description, array $stylesheets = []){
    require_once 'layout/header.php';
}

function getfooter(){
    require_once 'layout/footer.php';
}

function getmenu(){
    require_once 'layout/menu.php';
}

