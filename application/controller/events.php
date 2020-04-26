<?php
namespace Application\controller;
use Application\model\Event;
use Application\model\User;
use Application\model\Record;
use Application\core\Controller;

class events extends Controller {

    public function index(...$error) {
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

    public function detail(...$id) {
        $id = $id[0];
        $eventModel = new Event($this->db);
        $event = $eventModel->getEvent($id);
        require APP . 'view/_templates/header.php';
        require APP . 'view/events/detail.php';
        require APP . 'view/_templates/footer.php';
    }

    public function edit(...$id) {
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

    public function delete(...$id) {
        $id = $id[0];
        $eventModel = new Event($this->db);
        $result = $eventModel->deleteEvent($id);
        if($result) {
            header('location: ' . URL . "events/index/deleteFail");
            exit();
        } else {
            header('location: ' . URL . "events/index/deleteSuc");
            exit();
        }
    }

    public function addUser(...$id) {
        $e_id = $id[0];
        if(isset($_POST) && !empty($_POST)) {
            $recordModel = new Record($this->db);
            $recordModel->addRecord($_POST, $e_id);
            header('location: ' . URL . 'records/index');
        }
        $userModel = new User($this->db);
        $users = $userModel->getAllUsers($id);
        require APP . 'view/_templates/header.php';
        require APP . 'view/events/addUser.php';
        require APP . 'view/_templates/footer.php';
    }
}