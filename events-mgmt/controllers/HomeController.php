<?php
require_once 'models/EventModel.php';

class HomeController {
    private $eventModel;

    public function __construct() {
        $this->eventModel = new EventModel();
    }

    public function index() {
        $events = $this->eventModel->getUpcomingEvents();
        require 'views/home.php';
    }
}
?>
