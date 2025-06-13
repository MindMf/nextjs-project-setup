<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Ajouter un Événement - Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <style>
        body {
            background-color: #121212;
            color: #f0f0f0;
        }
        .form-container {
            max-width: 600px;
            margin: 40px auto;
            background: linear-gradient(135deg, #ff00cc, #333399);
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 0 15px #ff00cc;
        }
        .form-control, .btn {
            border-radius: 10px;
        }
        .btn-primary {
            background-color: #ff00cc;
            border: none;
        }
        .btn-primary:hover {
            background-color: #ff66cc;
        }
        a {
            color: #ff99cc;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h2 class="mb-4 text-center">Ajouter un Événement</h2>
        <?php if (!empty($errors)): ?>
            <div class="alert alert-danger">
                <ul>
                    <?php foreach ($errors as $error): ?>
                        <li><?= htmlspecialchars($error) ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>
        <form method="post" action="index.php?page=admin_add_event">
            <div class="mb-3">
                <label for="title" class="form-label">Titre</label>
                <input type="text" class="form-control" id="title" name="title" required value="<?= isset($title) ? htmlspecialchars($title) : '' ?>" />
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="description" rows="4"><?= isset($description) ? htmlspecialchars($description) : '' ?></textarea>
            </div>
            <div class="mb-3">
                <label for="event_date" class="form-label">Date et heure</label>
                <input type="datetime-local" class="form-control" id="event_date" name="event_date" required value="<?= isset($event_date) ? htmlspecialchars($event_date) : '' ?>" />
            </div>
            <div class="mb-3">
                <label for="location" class="form-label">Lieu</label>
                <input type="text" class="form-control" id="location" name="location" value="<?= isset($location) ? htmlspecialchars($location) : '' ?>" />
            </div>
            <div class="mb-3">
                <label for="capacity" class="form-label">Capacité</label>
                <input type="number" class="form-control" id="capacity" name="capacity" min="0" value="<?= isset($capacity) ? (int)$capacity : 0 ?>" />
            </div>
            <button type="submit" class="btn btn-primary w-100">Ajouter</button>
        </form>
        <p class="mt-3 text-center"><a href="index.php?page=admin_dashboard">Retour au tableau de bord</a></p>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
