<?php

require APP . 'model/Event.php';

class Home extends Controller {
    /**
     * home page
     */
    public function index() {
        $eventModel = new Event($this->db);
        $events = $eventModel->getAllEvents();
        // var_dump($events);
        require APP . 'view/_templates/header.php';
        require APP . 'view/home/index.php';
        require APP . 'view/_templates/footer.php';
    }
}