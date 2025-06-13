<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Mes Inscriptions - Gestion d'Événements</title>
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
        .btn-cancel {
            background-color: #cc0033;
            border: none;
            border-radius: 10px;
            color: #fff;
            transition: background-color 0.3s ease;
        }
        .btn-cancel:hover {
            background-color: #ff3366;
        }
        a {
            color: #ff99cc;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Mes Inscriptions</h1>
        <?php if (empty($registrations)): ?>
            <p>Vous n'êtes inscrit à aucun événement.</p>
        <?php else: ?>
            <table class="table table-striped table-dark">
                <thead>
                    <tr>
                        <th>Événement</th>
                        <th>Date</th>
                        <th>Lieu</th>
                        <th>Statut</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($registrations as $reg): ?>
                        <tr>
                            <td><?= htmlspecialchars($reg['title']) ?></td>
                            <td><?= date('d/m/Y H:i', strtotime($reg['event_date'])) ?></td>
                            <td><?= htmlspecialchars($reg['location']) ?></td>
                            <td><?= htmlspecialchars($reg['status']) ?></td>
                            <td>
                                <a href="index.php?page=cancel_registration&id=<?= $reg['id'] ?>" class="btn btn-cancel" onclick="return confirm('Confirmer l\'annulation ?');">Annuler</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>
        <p><a href="index.php?page=events_list">Voir les événements</a></p>
        <p><a href="index.php?page=logout">Déconnexion</a></p>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
