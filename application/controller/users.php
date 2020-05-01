<?php
namespace Application\controller;
use Application\model\User;
use Application\core\Controller;

class users extends Controller {

    public function index(...$params) {
        $delResult = '';
        if(!empty($params) && is_string($params[0])) {
            $delResult = $params[0];
        }
        $m_id = $this->getCurrentMemberId();
        $userModel = new User($this->db);
        $userModel->setMemberId($m_id);
        $users = $userModel->getAllUsers();
        $this->view(
            $view = 'users/index',
            $template = true, 
            $data = compact(
                'users',
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
                $userModel = new User($this->db);
                $userModel->setMemberId($m_id);
                $userModel->setName($_POST['name']);
                $userModel->setText($_POST['text']);
                $userModel->setDate($_POST['date']);
                $userModel->setMemberId($m_id);
                $userModel->addUser();
                header('location: ' . URL. "users/index");
                exit();
            }
        }
        $this->view(
            $view = 'users/create', 
            $template = true,
            $data = compact(
                'errors',
            )
        );
    }

    public function detail(...$id) {
        $userId = $id[0];
        $userModel = new User($this->db);
        $userModel->setuserId($userId);
        $user = $userModel->getUser();
        $this->view(
            $view = 'users/detail',
            $template = true, 
            $data = compact(
                'user',
            ) 
        );
    }

    public function edit(...$id) {
        $errors = [];
        $userId = $id[0];
        $mode = 'edit';
        $userModel = new User($this->db);
        $userModel->setUserId($userId);
        if(isset($_POST) && !empty($_POST)) {
            $errors = $this->validation->checkValudate($_POST);
            if(empty($errors)) {
                $userModel->setName($_POST['name']);
                $userModel->setText($_POST['text']);
                $userModel->setDate($_POST['date']);
                $result = $userModel->editUser();
                if($result) {
                    header("location: " . URL . "users/detail/$userId");
                    exit();
                }
            }
        }
        $user = $userModel->getUser($mode);
        $this->view(
            $view = 'users/edit',
            $template = true, 
            $data = compact(
                'user',
                'errors',
            )
        );
    }

    public function delete(...$id) {
        $userId = $id[0];
        $userModel = new User($this->db);
        $userModel->setUserId($userId);
        $result = $userModel->deleteUser();
        if($result) {
            header('location: ' . URL . "users/index/deleteFail");
        } 
        else {
            header('location: ' . URL . "users/index/deleteSuc");
        }
        exit();
    }
}