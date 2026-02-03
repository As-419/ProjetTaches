<?php
require_once "requete.php"; 

// --- AJOUT ---
if (isset($_POST['ajoutTache'])) {
    $titre = $_POST['titre'] ?? '';
    $description = $_POST['description'] ?? '';
    $priorite = $_POST['priorite'] ?? '';
    $date_limite = $_POST['date_limite'] ?? '';
    $responsable = $_POST['responsable'] ?? '';

    if ($titre && $description && $priorite && $date_limite && $responsable) {
        if (addTache($titre, $description, $priorite, $date_limite, $responsable)) {
            header("Location: http://localhost/groupedeux/ProjetTaches1/?page=indexTaches");
            exit();
        } 
    }
}

// --- CHANGEMENT STATUT ---
if (isset($_GET['action'], $_GET['id']) && $_GET['action'] === 'changer_statut') {
    $id = $_GET['id'];
    $taches = getTaches();
    foreach ($taches as $t) {
        if ($t['id'] === $id) {
            $nouveauStatut = 'à faire';
            if ($t['statut'] === 'à faire') $nouveauStatut = 'en cours';
            elseif ($t['statut'] === 'en cours') $nouveauStatut = 'terminée';
            changeStatut($id, $nouveauStatut); 
            break;
        }
    }
    header("Location: http://localhost/groupedeux/ProjetTaches1/?page=indexTaches"); 
    exit();
}

// --- SUPPRESSION ---
if (isset($_GET['action'], $_GET['id']) && $_GET['action'] === 'supprimer') {
    $id = $_GET['id'];
    if (deleteTache($id)) {
        header("Location: http://localhost/groupedeux/ProjetTaches1/?page=indexTaches");
        exit();
    } else {
        echo "Erreur lors de la suppression";
        exit();
    }
}

// --- MODIFICATION ---
if (isset($_POST['modifierTache'])) {
    $id = $_POST['id'] ?? '';
    $titre = $_POST['titre'] ?? '';
    $description = $_POST['description'] ?? '';
    $priorite = $_POST['priorite'] ?? '';
    $date_limite = $_POST['date_limite'] ?? '';
    $responsable = $_POST['responsable'] ?? '';

    if ($id && $titre && $description && $priorite && $date_limite && $responsable) {
        updateTache($id, $titre, $description, $priorite, $date_limite, $responsable);
        header("Location: http://localhost/groupedeux/ProjetTaches1/?page=indexTaches");
        exit();
    }
}

// --- LISTE DES TÂCHES ---
$listeTaches = getTaches();
?>
