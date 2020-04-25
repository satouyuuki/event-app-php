<?php
namespace Application\controller;
use Application\model\User;
use Application\core\Controller;

class users extends Controller {

    public function index() {
        $userModel = new User($this->db);
        $users = $userModel->getAllUsers();
        require APP . 'view/_templates/header.php';
        require APP . 'view/users/index.php';
        require APP . 'view/_templates/footer.php';
    }
}