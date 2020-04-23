<?php

class Application {
    private $url_controller = null;
    private $url_action = null;
    private $url_params = array();

    /**
     * Application constructor
     */
    public function __construct() {
        $this->splitUrl();
        // $this->security();
        if(file_exists(APP . 'controller/' . $this->url_controller . '.php')) {
            require APP . 'controller/' . $this->url_controller . '.php';
            $this->url_controller = new $this->url_controller();
            if(method_exists($this->url_controller, $this->url_action)) {
                call_user_func_array(array($this->url_controller, $this->url_action), $this->url_params);
            }
            else {
                if(strlen($this->url_action) == 0) {
                    $this->url_controller->index();
                }
                else {
                    header('location: ' . URL . 'problem');
                }
            }
        }
        else {
            header('location: ' . URL . 'problem');
        }
    }
    /**
     * Split params
     */
    private function splitUrl()
    {
        $_params = $_GET;
        $this->url_controller = isset($_params['controller']) ? $_params['controller'] : "home";
        $this->url_action = isset($_params['action']) ? $_params['action'] : "index";
        unset($_params['controller']);
        unset($_params['action']);
        $this->url_params = $_params;
    }
    /**
     * redirect to login if session not found
     */
    // private function security() {
    //     if(!isset($_SESSION['current_user_id']) and $this->url_controller != "login") {
    //         header('location: ' . URL . '?controller=login');
    //     }
    // }
}