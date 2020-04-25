<?php
namespace Application\controller;
use Application\model\Event;
use Application\core\Controller;

class events extends Controller {

    public function index() {
        $eventModel = new Event($this->db);
        $events = $eventModel->getAllEvents();
        require APP . 'view/_templates/header.php';
        require APP . 'view/events/index.php';
        require APP . 'view/_templates/footer.php';
    }

    public function create() {
        if(isset($_POST) && !empty($_POST)) {
            $eventModel = new Event($this->db);
            $eventModel->addEvent($_POST);
            header('location: ' . URL);
        }
        require APP . 'view/_templates/header.php';
        require APP . 'view/events/create.php';
        require APP . 'view/_templates/footer.php';
    }

    public function detail($id) {
        $id = $id[0];
        $eventModel = new Event($this->db);
        $event = $eventModel->getEvent($id);
        require APP . 'view/_templates/header.php';
        require APP . 'view/events/detail.php';
        require APP . 'view/_templates/footer.php';
    }

    public function edit($id) {
        $id = $id[0];
        if(isset($_POST) && !empty($_POST)) {
            $eventModel = new Event($this->db);
            $result = $eventModel->editEvent($_POST, $id);
            if($result) {
                header("location: " . URL . "events/detail/$id");
                exit();
            }
        }
        $eventModel = new Event($this->db);
        $event = $eventModel->getEvent($id);
        require APP . 'view/_templates/header.php';
        require APP . 'view/events/edit.php';
        require APP . 'view/_templates/footer.php';
    }

    public function delete($id) {
        $id = $id[0];
        $eventModel = new Event($this->db);
        $result = $eventModel->deleteEvent($id);
        if($result) {
            header('location: ' . URL);
        }
    }
}