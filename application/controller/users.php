<?php
namespace Application\controller;
use Application\model\User;
use Application\core\Controller;

class users extends Controller {

    public function index(...$error) {
        $m_id = $this->getCurrentMemberId();
        $userModel = new User($this->db);
        $users = $userModel->getAllUsers($m_id);
        require APP . 'view/_templates/header.php';
        require APP . 'view/users/index.php';
        require APP . 'view/_templates/footer.php';
    }
    public function create() {
        if(isset($_POST) && !empty($_POST)) {
            $m_id = $this->getCurrentMemberId();
            $userModel = new User($this->db);
            $userModel->addUser($_POST, $m_id);
            header('location: ' . URL . "users/index");
            exit();
        }
        $this->view('view/users/create.php');
    }

    public function detail(...$id) {
        $id = $id[0];
        $userModel = new User($this->db);
        $user = $userModel->getUser($id);
        require APP . 'view/_templates/header.php';
        require APP . 'view/users/detail.php';
        require APP . 'view/_templates/footer.php';
    }

    public function edit(...$id) {
        $id = $id[0];
        if(isset($_POST) && !empty($_POST)) {
            $userModel = new User($this->db);
            $result = $userModel->editUser($_POST, $id);
            if($result) {
                header("location: " . URL . "users/detail/$id");
                exit();
            }
        }
        $userModel = new User($this->db);
        $user = $userModel->getUser($id);
        require APP . 'view/_templates/header.php';
        require APP . 'view/users/edit.php';
        require APP . 'view/_templates/footer.php';
    }

    public function delete(...$id) {
        $id = $id[0];
        $userModel = new User($this->db);
        $result = $userModel->deleteUser($id);
        if($result) {
            header('location: ' . URL . "users/index/deleteFail");
            exit();
        } else {
            header('location: ' . URL . "users/index/deleteSuc");
            exit();
        }
    }
}