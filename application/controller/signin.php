<?php
namespace Application\controller;
use Application\core\Controller;
use Application\model\Member;

class Signin extends Controller {
    public function index() {
        if($_POST) {
            if($_SESSION['token'] === $_POST['token']) {
                $member = new Member($this->db);
                $member = $member->signin($_POST['email'], $_POST['password']);
                header('location: ' . URL .'/login');
                exit();
            }
        }
        require APP . 'view/signin.php';
    }

}
