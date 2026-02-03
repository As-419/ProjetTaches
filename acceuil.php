<?php
require_once "traitements/requete.php";
$stats = getStats();
?>

<div class="container mt-5">
    <!-- Header -->
    <div class="text-center mb-5 animate__animated animate__fadeInDown">
        <h1 class="fw-bold text-secondary">
            <i class="bi bi-kanban-fill"></i> Gestionnaire de Tâches
        </h1>
        <p class="text-muted">Organisez, suivez et complétez vos tâches efficacement</p>
    </div>

    <div class="row text-center mb-5">
        <div class="col-md-3">
            <div class="card shadow-sm border-0 animate__animated animate__fadeInUp">
                <div class="card-body">
                    <h5 class="card-title text-secondary">Total</h5>
                    <p class="display-6 fw-bold"><?= $stats['total'] ?></p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card shadow-sm border-0 animate__animated animate__fadeInUp">
                <div class="card-body">
                    <h5 class="card-title text-success">Terminées</h5>
                    <p class="display-6 fw-bold"><?= $stats['terminees'] ?></p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card shadow-sm border-0 animate__animated animate__fadeInUp">
                <div class="card-body">
                    <h5 class="card-title text-danger">En retard</h5>
                    <p class="display-6 fw-bold"><?= $stats['retard'] ?></p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card shadow-sm border-0 animate__animated animate__fadeInUp">
                <div class="card-body">
                    <h5 class="card-title text-primary">Progression</h5>
                    <p class="display-6 fw-bold"><?= $stats['pourcentage'] ?>%</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Bouton vers la liste -->
    <div class="text-center animate__animated animate__fadeInUp">
        <a href="?page=indexTaches" class="btn btn-secondary btn-lg shadow">
            <i class="bi bi-list-task"></i> Voir la liste des tâches
        </a>
    </div>
</div>

<!-- Animate.css + Bootstrap Icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css"/>
