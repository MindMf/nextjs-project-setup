<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Accueil - Gestion d'Événements</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <style>
        body {
            background-color: #121212;
            color: #f0f0f0;
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
        .event-title {
            font-weight: 700;
            font-size: 1.5rem;
            color: #ff66cc;
        }
        .event-date {
            font-style: italic;
            color: #ff99cc;
        }
        .event-location {
            color: #cc99ff;
        }
        .container {
            margin-top: 40px;
        }
        header {
            margin-bottom: 40px;
            text-align: center;
        }
        header h1 {
            font-family: 'Arial Black', Arial, sans-serif;
            color: #ff33cc;
            text-shadow: 0 0 10px #ff33cc;
        }
    </style>
</head>
<body>
    <header>
        <h1>Événements à venir</h1>
    </header>
    <main class="container">
        <?php if (empty($events)): ?>
            <p>Aucun événement à venir pour le moment.</p>
        <?php else: ?>
            <?php foreach ($events as $event): ?>
                <div class="event-card">
                    <div class="event-title"><?= htmlspecialchars($event['title']) ?></div>
                    <div class="event-date"><?= date('d/m/Y H:i', strtotime($event['event_date'])) ?></div>
                    <div class="event-location"><?= htmlspecialchars($event['location']) ?></div>
                    <p><?= nl2br(htmlspecialchars($event['description'])) ?></p>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
