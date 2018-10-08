<?php 
require_once '../../security.php';
require_once '../../../model/database.php';

$tag = $_POST["tag"];

insertTag($tag);

header("Location: index.php");