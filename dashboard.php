<?php
require_once "traitements/requete.php";
$stats = getStats();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <!-- Animate.css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
</head>
<body class="bg-light">

<div class="container mt-5">
    <h2 class="mb-4 text-center fw-bold text-secondary animate__animated animate__fadeInDown">
        📊 Tableau de bord des tâches
    </h2>
    <div class="row g-4">
        
        <!-- Total -->
        <div class="col-md-3">
            <div class="card shadow-sm border-0 h-100 bg-light animate__animated animate__zoomIn">
                <div class="card-body text-center">
                    <i class="bi bi-list-task display-4 text-secondary"></i>
                    <h5 class="mt-3 text-secondary">Total</h5>
                    <h2 class="fw-bold text-secondary"><?= $stats['total'] ?></h2>
                </div>
            </div>
        </div>
        
        <!-- Terminées -->
        <div class="col-md-3">
            <div class="card shadow-sm border-0 h-100 bg-light animate__animated animate__zoomIn animate__delay-1s">
                <div class="card-body text-center">
                    <i class="bi bi-check-circle-fill display-4 text-secondary"></i>
                    <h5 class="mt-3 text-secondary">Terminées</h5>
                    <h2 class="fw-bold text-secondary"><?= $stats['terminees'] ?></h2>
                </div>
            </div>
        </div>
        
        <!-- Pourcentage -->
        <div class="col-md-3">
            <div class="card shadow-sm border-0 h-100 bg-light animate__animated animate__zoomIn animate__delay-2s">
                <div class="card-body text-center">
                    <i class="bi bi-bar-chart-fill display-4 text-secondary"></i>
                    <h5 class="mt-3 text-secondary">% Terminées</h5>
                    <h2 class="fw-bold text-secondary"><?= $stats['pourcentage'] ?>%</h2>
                    
                    <!-- Progress bar grise animée -->
                    <div class="progress mt-3" style="height: 10px;">
                        <div class="progress-bar bg-secondary progress-bar-striped progress-bar-animated" 
                             role="progressbar" 
                             style="width: <?= $stats['pourcentage'] ?>%;" 
                             aria-valuenow="<?= $stats['pourcentage'] ?>" aria-valuemin="0" aria-valuemax="100">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- En retard -->
        <div class="col-md-3">
            <div class="card shadow-sm border-0 h-100 bg-light animate__animated animate__zoomIn animate__delay-3s">
                <div class="card-body text-center">
                    <i class="bi bi-exclamation-triangle-fill display-4 text-secondary"></i>
                    <h5 class="mt-3 text-secondary">En retard</h5>
                    <h2 class="fw-bold text-secondary"><?= $stats['retard'] ?></h2>
                </div>
            </div>
        </div>
        
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
