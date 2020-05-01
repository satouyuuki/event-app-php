<?php
namespace Application\controller;
use Application\model\Event;
use Application\model\User;
use Application\model\Record;
use Application\core\Controller;

class events extends Controller {

    public function index(...$params) {
        $delResult = '';
        if(!empty($params) && is_string($params[0])) {
            $delResult = $params[0];
        }
        $m_id = $this->getCurrentMemberId();
        $eventModel = new Event($this->db);
        $eventModel->setMemberId($m_id);
        $events = $eventModel->getAllEvents();
        $this->view(
            $view = 'events/index',
            $template = true, 
            $data = compact(
                'events',
                'delResult'
            )
        );
    }

    public function create() {
        $errors = [];
        if(isset($_POST) && !empty($_POST)) {
            $errors = $this->validation->checkValudate($_POST);
            if(empty($errors)) {
                $m_id = $this->getCurrentMemberId();
                $eventModel = new Event($this->db);
                $eventModel->setMemberId($m_id);
                $eventModel->setName($_POST['name']);
                $eventModel->setText($_POST['text']);
                $eventModel->setDate($_POST['date']);
                $eventModel->setMemberId($m_id);
                $eventModel->addEvent();
                header('location: ' . URL);
                exit();
            }
        }
        $this->view(
            $view = 'events/create', 
            $template = true,
            $data = compact(
                'errors',
            )
        );
    }

    public function detail(...$id) {
        $eventId = $id[0];
        $eventModel = new Event($this->db);
        $eventModel->setEventId($eventId);
        $event = $eventModel->getEvent();
        $this->view(
            $view = 'events/detail',
            $template = true, 
            $data = compact(
                'event',
            ) 
        );
    }

    public function edit(...$id) {
        $eventId = $id[0];
        $mode = 'edit';
        $eventModel = new Event($this->db);
        $eventModel->setEventId($eventId);
        if(isset($_POST) && !empty($_POST)) {
            $eventModel->setName($_POST['name']);
            $eventModel->setText($_POST['text']);
            $eventModel->setDate($_POST['date']);
            $result = $eventModel->editEvent();
            if($result) {
                header("location: " . URL . "events/detail/$eventId");
                exit();
            }
        }
        $event = $eventModel->getEvent($mode);
        $this->view(
            $view = 'events/edit',
            $template = true, 
            $data = compact(
                'event',
            )
        );
    }

    public function delete(...$id) {
        $eventId = $id[0];
        $eventModel = new Event($this->db);
        $eventModel->setId($eventId);
        $result = $eventModel->deleteEvent();
        if($result) {
            header('location: ' . URL . "events/index/deleteFail");
        } 
        else {
            header('location: ' . URL . "events/index/deleteSuc");
        }
        exit();
    }

    public function addUser(...$id) {
        $e_id = $id[0];
        $m_id = $this->getCurrentMemberId();
        if(isset($_POST) && !empty($_POST)) {
            $post = [];
            $post = $_POST;
            $u_id = $post['users'];
            if($u_id == '-1') {
                $userModel = new User($this->db);
                $userModel->addEventUser($post, $m_id);
                $post['users'] = (int)$this->db->lastInsertId();
            }
            $recordModel = new Record($this->db);
            $recordModel->addRecord($post, $e_id);
            header('location: ' . URL . 'records/index');
        }
        $userModel = new User($this->db);
        $users = $userModel->getAllUsers($m_id);
        require APP . 'view/_templates/header.php';
        require APP . 'view/events/addUser.php';
        require APP . 'view/_templates/footer.php';
    }
}