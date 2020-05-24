<?php
namespace Application\controller;
use Application\core\Controller;
use Application\model\Member;

class Signup extends Controller {
    public function index() {
        $errors = [];
        if($_POST) {
            if($_SESSION['token'] === $_POST['token']) {
                $errors = $this->validation->checkValudate($_POST);
                if(empty($errors)) {
                    $member = new Member($this->db);
                    $member = $member->signup($_POST['email'], $_POST['password']);
                    if($member) {
                        header('location: ' . URL .'/login');
                        exit();
                    }
                    else {
                        $errors['signup'] = "そのメールアドレスは使用済みです。";
                    }
                }
            }
        }
        $this->view(
            $view = 'signup',
            $template = true,
            $data = compact(
                'errors',
            )
        );
    }

}
