<?php
$dossierpublic = "http://localhost/groupedeux/ProjetTaches1/public/";
require_once "traitements/action.php"; 
require_once "traitements/requete.php";
include_once "includes/header.php";
include_once "includes/navbar.php";
include_once "includes/sidebar.php";

$listeTaches = getTaches();

$view = $_GET['page'] ?? 'indexTaches';

if (file_exists("pages/$view.php")) {
    include_once "pages/$view.php";
} else {
    include_once "pages/error404.php";
}

include_once "includes/footer.php";
