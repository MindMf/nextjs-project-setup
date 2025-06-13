<?php
session_start();

// Chargement automatique des classes (contrôleurs, modèles)
spl_autoload_register(function ($class) {
    $paths = ['controllers/', 'models/'];
    foreach ($paths as $path) {
        $file = __DIR__ . '/' . $path . $class . '.php';
        if (file_exists($file)) {
            require_once $file;
            return;
        }
    }
});

// Récupération de la page demandée via l'URL, ex: index.php?page=home
$page = $_GET['page'] ?? 'home';

// Routage simple
switch ($page) {
    case 'home':
        $controller = new HomeController();
        $controller->index();
        break;
    case 'register':
        $controller = new UserController();
        $controller->register();
        break;
    case 'login':
        $controller = new UserController();
        $controller->login();
        break;
    case 'logout':
        $controller = new UserController();
        $controller->logout();
        break;
    case 'admin_dashboard':
        $controller = new AdminController();
        $controller->dashboard();
        break;
    case 'admin_add_event':
        $controller = new AdminController();
        $controller->addEvent();
        break;
    case 'admin_edit_event':
        $controller = new AdminController();
        $controller->editEvent();
        break;
    case 'admin_delete_event':
        $controller = new AdminController();
        $controller->deleteEvent();
        break;
    // Ajouter d'autres routes ici (admin, events, etc.)
    default:
        http_response_code(404);
        echo "Page non trouvée";
        break;
}
?>
