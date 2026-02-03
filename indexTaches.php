<div class="container mt-4">
    <div class="row justify-content-center mb-4">
        <div class="col-md-6 col-lg-5">
            <div class="card shadow border-0">
                <div class="card-header bg-secondary text-white text-center fw-bold">
                    Nouvelle tâche
                </div>
                <div class="card-body">
                    <form method="POST">
                        <div class="mb-2">
                            <label>Titre</label>
                            <input type="text" name="titre" class="form-control form-control-sm" required>
                        </div>

                        <div class="mb-2">
                            <label>Description</label>
                            <textarea name="description" class="form-control form-control-sm" required></textarea>
                        </div>

                        <div class="mb-2">
                            <label>Priorité</label>
                            <select name="priorite" class="form-select form-select-sm">
                                <option value="basse">Basse</option>
                                <option value="moyenne">Moyenne</option>
                                <option value="haute">Haute</option>
                            </select>
                        </div>
                        <div class="mb-2">
                            <label>Date limite</label>
                            <input type="date" name="date_limite" class="form-control form-control-sm" required>
                        </div>

                        <div class="mb-2">
                            <label>Responsable</label>
                            <input type="text" name="responsable" class="form-control form-control-sm" required>
                        </div>

                        <button name="ajoutTache" class="btn btn-secondary btn-sm w-100">
                            Ajouter
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    
    <div class="card shadow border-0">
        <div class="card-header bg-secondary text-white text-center fw-bold">
            Liste des tâches
        </div>
        <div class="card-body">
            <table class="table table-hover align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Titre</th>
                        <th>Priorité</th>
                        <th>Statut</th>
                        <th>Date limite</th>
                        <th>Responsable</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach ($listeTaches as $i => $t) : 
                    $aujourdhui = date("Y-m-d");
                    $retard = ($t['statut'] !== 'terminée' && $t['date_limite'] < $aujourdhui);
                ?>

                <tr>
                <?php if (isset($_GET['edit']) && $_GET['edit'] === $t['id']) : ?>

                    <form method="POST">
                        <input type="hidden" name="id" value="<?= $t['id'] ?>">

                        <td><?= $i + 1 ?></td>

                        <td>
                            <input type="text" name="titre"
                                   value="<?= htmlspecialchars($t['titre']) ?>"
                                   class="form-control form-control-sm" required>
                        </td>

                        <td>
                            <select name="priorite" class="form-select form-select-sm">
                                <option value="basse" <?= $t['priorite']=='basse'?'selected':'' ?>>Basse</option>
                                <option value="moyenne" <?= $t['priorite']=='moyenne'?'selected':'' ?>>Moyenne</option>
                                <option value="haute" <?= $t['priorite']=='haute'?'selected':'' ?>>Haute</option>
                            </select>
                        </td>

                        <td>
                            <span class="badge bg-warning text-dark"><?= $t['statut'] ?></span>
                        </td>

                        <td>
                            <input type="date" name="date_limite"
                                   value="<?= $t['date_limite'] ?>"
                                   class="form-control form-control-sm">
                        </td>

                        <td>
                            <input type="text" name="responsable"
                                   value="<?= htmlspecialchars($t['responsable']) ?>"
                                   class="form-control form-control-sm">
                        </td>

                        <td class="text-center">
                            <button name="modifierTache" class="btn btn-sm btn-success">✔</button>
                            <a href="?page=indexTaches" class="btn btn-sm btn-secondary">✖</a>
                        </td>
                    </form>
                <?php else : ?>

                    <td><?= $i + 1 ?></td>
                    <td><?= htmlspecialchars($t['titre']) ?></td>

                    <td>
                        <?php
                        if ($t['priorite'] === 'haute')
                            echo '<span class="badge bg-danger">Haute</span>';
                        elseif ($t['priorite'] === 'moyenne')
                            echo '<span class="badge bg-warning text-dark">Moyenne</span>';
                        else
                            echo '<span class="badge bg-secondary">Basse</span>';
                        ?>
                    </td>

                    <td>
                        <?= $t['statut'] ?>
                        <?php if ($retard) echo ' <span class="text-danger fw-bold">⚠</span>'; ?>
                    </td>

                    <td><?= $t['date_limite'] ?></td>
                    <td><?= htmlspecialchars($t['responsable']) ?></td>

                    <td class="text-center">
                        <a href="?action=changer_statut&id=<?= $t['id'] ?>"
                           class="btn btn-sm btn-warning">↻</a>

                        <?php if ($t['statut'] !== 'terminée') : ?>
                        <a href="?page=indexTaches&edit=<?= $t['id'] ?>"
                           class="btn btn-sm btn-info text-white">✏️</a>
                        <?php endif; ?>

                        <a href="?action=supprimer&id=<?= $t['id'] ?>"
                           onclick="return confirm('Supprimer cette tâche ?')"
                           class="btn btn-sm btn-danger">🗑️</a>
                    </td>

                <?php endif; ?>
                </tr>

                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
