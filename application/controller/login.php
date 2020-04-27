<?php
namespace Application\controller;
use Application\core\Controller;
use Application\model\Member;

class Login extends Controller {
    public function index() {
        if($_POST) {
            // echo 'hello!';
            if($_SESSION['token'] === $_POST['token']) {
                $member = new Member($this->db);
                $member = $member->login($_POST['email'], $_POST['password']);
                // var_dump($member);
                // exit();
                if($member) {
                    $_SESSION['current_member_id'] = $member->id;
                    $_SESSION['current_member_email'] = $member->email;
                    header('location: ' . URL);
                    exit();
                }
                else {
                    $error = "エラーが発生しました。";
                }
            }
        }
        require APP . 'view/login.php';
    }

    public function logout()
    {
        session_destroy();
        header('location: ' . URL ."?controller=login");
    }
}
