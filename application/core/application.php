<?php
namespace Application\core;

class Application {
    private $url_controller = null;
    private $url_action = null;
    private $url_params = array();

    /**
     * Application constructor
     */
    public function __construct() {
        $this->splitUrl();
        $this->security();
        if(file_exists(APP . 'controller/' . $this->url_controller . '.php')) {
            $instans_url = 'Application\\controller\\' . $this->url_controller;
            $this->url_controller = new $instans_url;
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

    public function getController() {
        return $this->url_controller;
    }


    /**
     * Split params
     */
    private function splitUrl()
    {
        if(isset($_GET['url'])) {
            $url = explode('/', filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL));
            $this->url_controller = isset($url[0]) ? $url[0] : "events";
            $this->url_action = isset($url[1]) ? $url[1] : "index";
            unset($url[0]);
            unset($url[1]);
            $this->url_params = $url ? array_values($url) : [];
        } else {
            $this->url_controller = "events";
            $this->url_action = "index";
            $this->url_params = [];
        }
    }
    /**
     * redirect to login if session not found
     */
    private function security() {
        if(!isset($_SESSION['current_member_id'])) {
            if($this->url_controller != "login" and $this->url_controller != "signin") {
                header('location: ' . URL . '/login');
                exit();
            }
        }
    }
}