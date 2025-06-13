<?php
require_once 'config/database.php';

class EventModel {
    private $pdo;

    public function __construct() {
        global $pdo;
        $this->pdo = $pdo;
    }

    public function getUpcomingEvents() {
        $stmt = $this->pdo->prepare("SELECT * FROM events WHERE event_date >= NOW() ORDER BY event_date ASC");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getAllEvents() {
        $stmt = $this->pdo->prepare("SELECT * FROM events ORDER BY event_date DESC");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function createEvent($title, $description, $event_date, $location, $capacity) {
        $stmt = $this->pdo->prepare("INSERT INTO events (title, description, event_date, location, capacity) VALUES (:title, :description, :event_date, :location, :capacity)");
        return $stmt->execute([
            'title' => $title,
            'description' => $description,
            'event_date' => $event_date,
            'location' => $location,
            'capacity' => $capacity
        ]);
    }

    public function getEventById($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM events WHERE id = :id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetch();
    }

    public function updateEvent($id, $title, $description, $event_date, $location, $capacity) {
        $stmt = $this->pdo->prepare("UPDATE events SET title = :title, description = :description, event_date = :event_date, location = :location, capacity = :capacity WHERE id = :id");
        return $stmt->execute([
            'id' => $id,
            'title' => $title,
            'description' => $description,
            'event_date' => $event_date,
            'location' => $location,
            'capacity' => $capacity
        ]);
    }

    public function deleteEvent($id) {
        $stmt = $this->pdo->prepare("DELETE FROM events WHERE id = :id");
        return $stmt->execute(['id' => $id]);
    }
}
?>
