<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Tableau de bord Admin - Gestion d'Événements</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <style>
        body {
            background-color: #121212;
            color: #f0f0f0;
        }
        .container {
            margin-top: 40px;
        }
        h1 {
            color: #ff33cc;
            text-align: center;
            margin-bottom: 30px;
            text-shadow: 0 0 10px #ff33cc;
        }
        table {
            background: #222;
            border-radius: 10px;
        }
        th, td {
            color: #f0f0f0;
            vertical-align: middle !important;
        }
        a.btn-primary {
            background-color: #ff00cc;
            border: none;
        }
        a.btn-primary:hover {
            background-color: #ff66cc;
        }
        .btn-danger {
            background-color: #cc0033;
            border: none;
        }
        .btn-danger:hover {
            background-color: #ff3366;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Gestion des Événements</h1>
        <a href="index.php?page=admin_add_event" class="btn btn-primary mb-3">Ajouter un événement</a>
        <?php if (empty($events)): ?>
            <p>Aucun événement trouvé.</p>
        <?php else: ?>
            <table class="table table-striped table-dark">
                <thead>
                    <tr>
                        <th>Titre</th>
                        <th>Date</th>
                        <th>Lieu</th>
                        <th>Capacité</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($events as $event): ?>
                        <tr>
                            <td><?= htmlspecialchars($event['title']) ?></td>
                            <td><?= date('d/m/Y H:i', strtotime($event['event_date'])) ?></td>
                            <td><?= htmlspecialchars($event['location']) ?></td>
                            <td><?= (int)$event['capacity'] ?></td>
                            <td>
                                <a href="index.php?page=admin_edit_event&id=<?= $event['id'] ?>" class="btn btn-sm btn-primary">Modifier</a>
                                <a href="index.php?page=admin_delete_event&id=<?= $event['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Confirmer la suppression ?');">Supprimer</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>
        <a href="index.php?page=logout" class="btn btn-secondary mt-3">Déconnexion</a>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
