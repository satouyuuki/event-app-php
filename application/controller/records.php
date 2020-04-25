<?php
namespace Application\controller;
use Application\model\Record;
use Application\core\Controller;

class records extends Controller {

    public function index() {
        $recordModel = new Record($this->db);
        $records = $recordModel->getAllRecords();
        require APP . 'view/_templates/header.php';
        require APP . 'view/records/index.php';
        require APP . 'view/_templates/footer.php';
    }
    public function eventRecord($id) {
        $id = $id[0];
        $recordModel = new Record($this->db);
        $records = $recordModel->getEventRecord($id);
        require APP . 'view/_templates/header.php';
        require APP . 'view/records/eventRecord.php';
        require APP . 'view/_templates/footer.php';
    }
    public function userRecord($id) {
        $id = $id[0];
        $recordModel = new Record($this->db);
        $records = $recordModel->getUserRecord($id);
        require APP . 'view/_templates/header.php';
        require APP . 'view/records/userRecord.php';
        require APP . 'view/_templates/footer.php';
    }

    // public function create() {
    //     if(isset($_POST) && !empty($_POST)) {
    //         $userModel = new User($this->db);
    //         $userModel->addUser($_POST);
    //         header('location: ' . URL . "users/index");
    //     }
    //     require APP . 'view/_templates/header.php';
    //     require APP . 'view/users/create.php';
    //     require APP . 'view/_templates/footer.php';
    // }

    // public function detail($id) {
    //     $id = $id[0];
    //     $userModel = new User($this->db);
    //     $user = $userModel->getUser($id);
    //     require APP . 'view/_templates/header.php';
    //     require APP . 'view/users/detail.php';
    //     require APP . 'view/_templates/footer.php';
    // }

    // public function edit($id) {
    //     $id = $id[0];
    //     if(isset($_POST) && !empty($_POST)) {
    //         $userModel = new User($this->db);
    //         $result = $userModel->editUser($_POST, $id);
    //         if($result) {
    //             header("location: " . URL . "users/detail/$id");
    //             exit();
    //         }
    //     }
    //     $userModel = new User($this->db);
    //     $user = $userModel->getUser($id);
    //     require APP . 'view/_templates/header.php';
    //     require APP . 'view/users/edit.php';
    //     require APP . 'view/_templates/footer.php';
    // }

    // public function delete($id) {
    //     $id = $id[0];
    //     $userModel = new User($this->db);
    //     $result = $userModel->deleteUser($id);
    //     if($result) {
    //         header('location: ' . URL . "users/index");
    //     }
    // }
}