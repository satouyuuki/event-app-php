<?php
namespace Application\controller;
use Application\model\Event;
use Application\model\User;
use Application\model\Record;
use Application\core\Controller;

class events extends Controller {

    public function compass() {
        $events = [];
        $message = [];
        if(isset($_POST) && !empty($_POST)) {
            if(isset($_POST['searchBtn']) and !empty($_POST['searchBtn'])) {
                $keyword = urlencode($_POST['keyword']);
                $maxCount = urlencode($_POST['maxCount']);
                if(!empty($keyword) and !empty($maxCount)) {
                    $url="https://connpass.com/api/v1/event/?keyword=$keyword&count=$maxCount";
                    $context = stream_context_create(array('http' => array(
                        'method' => 'GET',
                        'header' => "User-Agent:" . $_SERVER['HTTP_USER_AGENT'],
                    )));
                    $json=file_get_contents($url, false, $context);
                    $json = mb_convert_encoding($json, 'UTF8', 'ASCII,JIS,UTF-8,EUC-JP,SJIS-WIN');
                    $arr = json_decode($json,true);
                    for($i=0; $i < count($arr['events']); $i++) {
                        $events[$i]['name'] = $arr['events'][$i]['title'];
                        $events[$i]['date'] = $arr['events'][$i]['started_at'];
                    }
                }
            }
            if(isset($_POST['addBtn']) and !empty($_POST['addBtn'])) {
                $name = $this->refreshKyes($_POST, 'name');
                $date = $this->refreshKyes($_POST, 'date');
                for($i=0; $i < count($name); $i++) {
                    $eventModel = new Event($this->db);
                    $eventModel->setMemberId($this->getCurrentMemberId());
                    $eventModel->setName($name[$i]);
                    $eventModel->setDate($date[$i]);
                    $result = $eventModel->addEventAPI();
                    if($result) {
                        $message['success'] = '登録が成功しました。';
                    }else {
                        $message['error'] = '登録が失敗しました。';
                    }
                }
            }
        }
        $this->view(
            $view = 'events/compass',
            $template = true, 
            $data = compact(
                'events',
                'message'
            )
        );
    }

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
                if($eventModel->checkName('events')) {
                    $errors['top'] = $eventModel->checkName('events');
                } 
                else {
                    $eventModel->setText($_POST['text']);
                    $eventModel->setDate($_POST['date']);
                    $eventModel->setMemberId($m_id);
                    $eventModel->addEvent();
                    header('location: ' . URL);
                    exit();
                }
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
        $errors = [];
        $eventId = $id[0];
        $mode = 'edit';
        $eventModel = new Event($this->db);
        $eventModel->setEventId($eventId);
        if(isset($_POST) && !empty($_POST)) {
            $errors = $this->validation->checkValudate($_POST);
            if(empty($errors)) {
                $eventModel->setName($_POST['name']);
                $eventModel->setMemberId($this->getCurrentMemberId());
                $eventModel->setText($_POST['text']);
                $eventModel->setDate($_POST['date']);
                $eventModel->editEvent();
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
                'errors'
            )
        );
    }

    public function delete(...$id) {
        $eventId = $id[0];
        $eventModel = new Event($this->db);
        $eventModel->setEventId($eventId);
        $result = $eventModel->checkEventId();
        if(!empty($result)) {
            header('location: ' . URL . "events/index/deleteFail");
            exit();
        }
        else {
            $eventModel->deleteEvent();
            header('location: ' . URL . "events/index/deleteSuc");
            exit();
        }
    }

    public function addUser(...$id) {
        $errors = [];
        $e_id = $id[0];
        $m_id = $this->getCurrentMemberId();
        if(isset($_POST) && !empty($_POST)) {
            $errors = $this->validation->checkValudate($_POST);
            if(empty($errors)) {
                $post = [];
                $post = $_POST;
                $u_id = $post['users'];
                if($u_id == '-1') {
                    $userModel = new User($this->db);
                    $userModel->setMemberId($m_id);
                    $userModel->setName($post['name']);
                    if($userModel->checkName('users')) {
                        $errors['top'] = $userModel->checkName('users');
                    }
                    else {
                        $userModel->addEventUser();
                        $u_id = (int)$this->db->lastInsertId();
                    }
                }
                if(!isset($errors['top'])) {
                    $recordModel = new Record($this->db);
                    $recordModel->setUserId($u_id);
                    $recordModel->setEventId($e_id);
                    $recordModel->setText($post['text']);
                    $recordModel->addRecord();
                    header('location: ' . URL . "records/eventRecord/$e_id");
                    exit();
                }
            }
        }
        $userModel = new User($this->db);
        $userModel->setMemberId($m_id);
        $userModel->setEventId($e_id);
        $users = $userModel->getAllUsersIsNotEvent();
        $this->view(
            $view = 'events/addUser',
            $template = true, 
            $data = compact(
                'users',
                'errors'
            )
        );
    }
}