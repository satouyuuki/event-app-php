<?php
namespace Application\controller;
use Application\core\Controller;
use Application\model\Member;

class Login extends Controller {
    public function index() {
        $errors = [];
        if($_POST) {
            if($_SESSION['token'] === $_POST['token']) {
                $errors = $this->validation->checkValudate($_POST);
                if(empty($errors)) {
                    $member = new Member($this->db);
                    $member = $member->login($_POST['email'], $_POST['password']);
                    if($member) {
                        $_SESSION['current_member_id'] = $member->id;
                        $_SESSION['current_member_email'] = $member->email;
                        header('location: ' . URL);
                        exit();
                    }
                    else {
                        $errors['login'] = "ログインに失敗しました。";
                    }
                }
            }
        }
        $this->view(
            $view = 'login',
            $template = true,
            $data = compact(
                'errors',
            )
        );
    }

    public function logout()
    {
        session_destroy();
        header('location: ' . URL ."/login");
    }
}
