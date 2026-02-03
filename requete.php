<?php
$file = __DIR__ . '/taches.json';

function getTaches() {
    global $file;  
    if (!file_exists($file)) {
        file_put_contents($file, '[]'); 
    }
    return json_decode(file_get_contents($file), true) ?? [];
}

function addTache($titre, $description, $priorite, $date_limite, $responsable) {
    global $file;
    $taches = getTaches();

    $id = uniqid();
    $date_creation = date("Y-m-d");
    $statut = "à faire";

    $tache = [
        'id' => $id,
        'titre' => htmlspecialchars($titre),
        'description' => htmlspecialchars($description),
        'priorite' => $priorite,
        'statut' => $statut,
        'date_creation' => $date_creation,
        'date_limite' => $date_limite,
        'responsable' => htmlspecialchars($responsable)
    ];

    $taches[] = $tache;
    return file_put_contents($file, json_encode($taches, JSON_PRETTY_PRINT)) !== false;
}

function deleteTache($id) {
    global $file;
    $taches = getTaches();
    $taches = array_filter($taches, fn($t) => $t['id'] !== $id);
    return file_put_contents($file, json_encode(array_values($taches), JSON_PRETTY_PRINT)) !== false;
}

function changeStatut($id, $nouveauStatut) {
    global $file;
    $taches = getTaches();
    foreach ($taches as &$t) {
        if ($t['id'] === $id) {
            $t['statut'] = $nouveauStatut;
        }
    }
    return file_put_contents($file, json_encode($taches, JSON_PRETTY_PRINT)) !== false;
}

function updateTache($id, $titre, $description, $priorite, $date_limite, $responsable) {
    global $file;
    $taches = getTaches();

    foreach ($taches as &$t) {
        if ($t['id'] === $id) {
            if ($t['statut'] !== 'terminée') {
                $t['titre'] = htmlspecialchars($titre);
                $t['description'] = htmlspecialchars($description);
                $t['priorite'] = $priorite;
                $t['date_limite'] = $date_limite;
                $t['responsable'] = htmlspecialchars($responsable);
            }
            break;
        }
    }

    return file_put_contents($file, json_encode($taches, JSON_PRETTY_PRINT)) !== false;
}

function getStats() {
    $taches = getTaches();
    $total = count($taches);
    $terminees = 0;
    $retard = 0;
    $aujourdhui = date("Y-m-d");

    foreach ($taches as $t) {
        if ($t['statut'] === 'terminée') {
            $terminees++;
        }
        if ($t['statut'] !== 'terminée' && $t['date_limite'] < $aujourdhui) {
            $retard++;
        }
    }

    $pourcentage = $total > 0 ? round(($terminees / $total) * 100, 2) : 0;

    return [
        'total' => $total,
        'terminees' => $terminees,
        'pourcentage' => $pourcentage,
        'retard' => $retard
    ];
}
?>
