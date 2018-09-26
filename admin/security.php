<?php
require_once __DIR__ . '/../model/database.php';
session_start();

$user = null;

if(isset($_POST["email"]) && isset($_POST["password"])) {
    //l'utilisateur vient du formulaire de login
    $email = $_POST['email'];
    $password = $_POST['password'];
    $user = getUtilisateurByEmailPassword($email, $password);
    if(isset($user['id'])) {
        //On enregistre dans la session l'id de l'utilisateur 
        $_SESSION['id'] = $user['id'];
    }
} elseif (isset($_SESSION['id'])) {
    //l'utilisateur est déjà connecté
    $user = getEntity("utilisateur", $_SESSION['id']);
}

if(!$user){
    header('Location: login.php');
} elseif (!$user['admin']) {
    header('Location: ../');

}