<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Liste des Événements - Gestion d'Événements</title>
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
        .event-card {
            background: linear-gradient(135deg, #ff00cc, #333399);
            border-radius: 15px;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 0 0 15px #ff00cc;
            transition: transform 0.3s ease;
        }
        .event-card:hover {
            transform: scale(1.05);
            box-shadow: 0 0 25px #ff66cc;
        }
        .btn-register {
            background-color: #ff00cc;
            border: none;
            border-radius: 10px;
            color: #fff;
            transition: background-color 0.3s ease;
        }
        .btn-register:hover {
            background-color: #ff66cc;
        }
        a {
            color: #ff99cc;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Liste des Événements</h1>
        <?php if (empty($events)): ?>
            <p>Aucun événement à venir.</p>
        <?php else: ?>
            <?php foreach ($events as $event): ?>
                <div class="event-card">
                    <h3><?= htmlspecialchars($event['title']) ?></h3>
                    <p><strong>Date :</strong> <?= date('d/m/Y H:i', strtotime($event['event_date'])) ?></p>
                    <p><strong>Lieu :</strong> <?= htmlspecialchars($event['location']) ?></p>
                    <p><?= nl2br(htmlspecialchars($event['description'])) ?></p>
                    <a href="index.php?page=register_event&id=<?= $event['id'] ?>" class="btn btn-register">S'inscrire</a>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
        <p><a href="index.php?page=home">Retour à l'accueil</a></p>
        <p><a href="index.php?page=user_registrations">Mes inscriptions</a></p>
        <p><a href="index.php?page=logout">Déconnexion</a></p>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
