<?php
namespace Application\controller;
use Application\core\Controller;
use Application\model\Member;

class Signin extends Controller {
    public function index() {
        $errors = [];
        if($_POST) {
            if($_SESSION['token'] === $_POST['token']) {
                $errors = $this->validation->checkValudate($_POST);
                if(empty($errors)) {
                    $member = new Member($this->db);
                    $member = $member->signin($_POST['email'], $_POST['password']);
                    if($member) {
                        header('location: ' . URL .'/login');
                        exit();
                    }
                    else {
                        $errors['signin'] = "そのメールアドレスは使用済みです。";
                    }
                }
            }
        }
        $this->view(
            $view = 'signin',
            $template = true,
            $data = compact(
                'errors',
            )
        );
    }

}
