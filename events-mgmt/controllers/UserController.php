<?php
require_once 'models/UserModel.php';

class UserController {
    private $userModel;
    private $registrationModel;
    private $eventModel;

    public function __construct() {
        $this->userModel = new UserModel();
        require_once 'models/RegistrationModel.php';
        require_once 'models/EventModel.php';
        $this->registrationModel = new RegistrationModel();
        $this->eventModel = new EventModel();
    }

    public function register() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = trim($_POST['username']);
            $email = trim($_POST['email']);
            $password = $_POST['password'];
            $passwordConfirm = $_POST['password_confirm'];

            $errors = [];

            if (empty($username) || empty($email) || empty($password) || empty($passwordConfirm)) {
                $errors[] = "Tous les champs sont obligatoires.";
            }

            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors[] = "Adresse email invalide.";
            }

            if ($password !== $passwordConfirm) {
                $errors[] = "Les mots de passe ne correspondent pas.";
            }

            if ($this->userModel->findByUsername($username)) {
                $errors[] = "Nom d'utilisateur déjà utilisé.";
            }

            if ($this->userModel->findByEmail($email)) {
                $errors[] = "Email déjà utilisé.";
            }

            if (empty($errors)) {
                $passwordHash = password_hash($password, PASSWORD_DEFAULT);
                if ($this->userModel->createUser($username, $email, $passwordHash)) {
                    header('Location: index.php?page=login&registered=1');
                    exit;
                } else {
                    $errors[] = "Erreur lors de la création du compte.";
                }
            }
        }
        require 'views/register.php';
    }

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = trim($_POST['username']);
            $password = $_POST['password'];

            $errors = [];

            $user = $this->userModel->findByUsername($username);
            if ($user && password_verify($password, $user['password'])) {
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['username'] = $user['username'];
                $_SESSION['role'] = $user['role'];
                header('Location: index.php?page=home');
                exit;
            } else {
                $errors[] = "Nom d'utilisateur ou mot de passe incorrect.";
            }
        }
        require 'views/login.php';
    }

    public function logout() {
        session_destroy();
        header('Location: index.php?page=login');
        exit;
    }

    public function eventsList() {
        $events = $this->eventModel->getUpcomingEvents();
        require 'views/events_list.php';
    }

    public function registerEvent() {
        if (!isset($_SESSION['user_id'])) {
            header('Location: index.php?page=login');
            exit;
        }
        $userId = $_SESSION['user_id'];
        $eventId = $_GET['id'] ?? null;
        if ($eventId) {
            $this->registrationModel->registerUserToEvent($userId, $eventId);
        }
        header('Location: index.php?page=user_registrations');
        exit;
    }

    public function userRegistrations() {
        if (!isset($_SESSION['user_id'])) {
            header('Location: index.php?page=login');
            exit;
        }
        $userId = $_SESSION['user_id'];
        $registrations = $this->registrationModel->getUserRegistrations($userId);
        require 'views/user_registrations.php';
    }

    public function cancelRegistration() {
        if (!isset($_SESSION['user_id'])) {
            header('Location: index.php?page=login');
            exit;
        }
        $userId = $_SESSION['user_id'];
        $registrationId = $_GET['id'] ?? null;
        if ($registrationId) {
            $this->registrationModel->cancelRegistration($registrationId, $userId);
        }
        header('Location: index.php?page=user_registrations');
        exit;
    }
}
?>
