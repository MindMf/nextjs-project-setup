<?php
require_once 'models/EventModel.php';

class AdminController {
    private $eventModel;

    public function __construct() {
        $this->eventModel = new EventModel();
        // Vérifier si l'utilisateur est admin
        session_start();
        if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
            header('Location: index.php?page=login');
            exit;
        }
    }

    public function dashboard() {
        $events = $this->eventModel->getAllEvents();
        require 'views/admin/dashboard.php';
    }

    public function addEvent() {
        $errors = [];
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $title = trim($_POST['title']);
            $description = trim($_POST['description']);
            $event_date = $_POST['event_date'];
            $location = trim($_POST['location']);
            $capacity = intval($_POST['capacity']);

            if (empty($title) || empty($event_date)) {
                $errors[] = "Le titre et la date de l'événement sont obligatoires.";
            }

            if (empty($errors)) {
                if ($this->eventModel->createEvent($title, $description, $event_date, $location, $capacity)) {
                    header('Location: index.php?page=admin_dashboard');
                    exit;
                } else {
                    $errors[] = "Erreur lors de la création de l'événement.";
                }
            }
        }
        require 'views/admin/add_event.php';
    }

    public function editEvent() {
        $errors = [];
        $id = $_GET['id'] ?? null;
        if (!$id) {
            header('Location: index.php?page=admin_dashboard');
            exit;
        }
        $event = $this->eventModel->getEventById($id);
        if (!$event) {
            header('Location: index.php?page=admin_dashboard');
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $title = trim($_POST['title']);
            $description = trim($_POST['description']);
            $event_date = $_POST['event_date'];
            $location = trim($_POST['location']);
            $capacity = intval($_POST['capacity']);

            if (empty($title) || empty($event_date)) {
                $errors[] = "Le titre et la date de l'événement sont obligatoires.";
            }

            if (empty($errors)) {
                if ($this->eventModel->updateEvent($id, $title, $description, $event_date, $location, $capacity)) {
                    header('Location: index.php?page=admin_dashboard');
                    exit;
                } else {
                    $errors[] = "Erreur lors de la mise à jour de l'événement.";
                }
            }
        }
        require 'views/admin/edit_event.php';
    }

    public function deleteEvent() {
        $id = $_GET['id'] ?? null;
        if ($id) {
            $this->eventModel->deleteEvent($id);
        }
        header('Location: index.php?page=admin_dashboard');
        exit;
    }
}
?>
