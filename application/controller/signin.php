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
                if($member) {
                    header('location: ' . URL .'/login');
                    exit();
                }
                else {
                    $errors = "そのメールアドレスは使用済みです。";
                }
            }
        }
        require APP . 'view/signin.php';
    }

}
