<?php
require_once 'config/database.php';

class RegistrationModel {
    private $pdo;

    public function __construct() {
        global $pdo;
        $this->pdo = $pdo;
    }

    public function registerUserToEvent($userId, $eventId) {
        // Check if already registered
        $stmt = $this->pdo->prepare("SELECT * FROM registrations WHERE user_id = :user_id AND event_id = :event_id");
        $stmt->execute(['user_id' => $userId, 'event_id' => $eventId]);
        if ($stmt->fetch()) {
            return false; // Already registered
        }

        $stmt = $this->pdo->prepare("INSERT INTO registrations (user_id, event_id) VALUES (:user_id, :event_id)");
        return $stmt->execute(['user_id' => $userId, 'event_id' => $eventId]);
    }

    public function getUserRegistrations($userId) {
        $stmt = $this->pdo->prepare("
            SELECT r.id, e.title, e.event_date, e.location, r.status
            FROM registrations r
            JOIN events e ON r.event_id = e.id
            WHERE r.user_id = :user_id
            ORDER BY e.event_date DESC
        ");
        $stmt->execute(['user_id' => $userId]);
        return $stmt->fetchAll();
    }

    public function cancelRegistration($registrationId, $userId) {
        $stmt = $this->pdo->prepare("DELETE FROM registrations WHERE id = :id AND user_id = :user_id");
        return $stmt->execute(['id' => $registrationId, 'user_id' => $userId]);
    }
}
?>
