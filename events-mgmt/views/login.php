<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Connexion - Gestion d'Événements</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <style>
        body {
            background-color: #121212;
            color: #f0f0f0;
        }
        .form-container {
            max-width: 400px;
            margin: 50px auto;
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
        <h2 class="mb-4 text-center">Connexion</h2>
        <?php if (!empty($errors)): ?>
            <div class="alert alert-danger">
                <ul>
                    <?php foreach ($errors as $error): ?>
                        <li><?= htmlspecialchars($error) ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>
        <?php if (isset($_GET['registered'])): ?>
            <div class="alert alert-success">
                Inscription réussie. Vous pouvez maintenant vous connecter.
            </div>
        <?php endif; ?>
        <form method="post" action="index.php?page=login">
            <div class="mb-3">
                <label for="username" class="form-label">Nom d'utilisateur</label>
                <input type="text" class="form-control" id="username" name="username" required value="<?= isset($username) ? htmlspecialchars($username) : '' ?>" />
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Mot de passe</label>
                <input type="password" class="form-control" id="password" name="password" required />
            </div>
            <button type="submit" class="btn btn-primary w-100">Se connecter</button>
        </form>
        <p class="mt-3 text-center">Pas encore de compte ? <a href="index.php?page=register">Inscrivez-vous</a></p>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
