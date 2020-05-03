<?php
namespace Application\controller;
use Application\core\Controller;

class Wellcome extends Controller {
    public function index() {
        $this->view(
            $view = 'wellcome',
        );
    }
}
