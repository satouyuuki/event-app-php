<?php
namespace Application\core;
use PDO;
use Application\utility\Utility;
use Application\validation\Validation;

class Controller extends Utility {
    public $db = null;
    public $validation = null;

    /**
     * Controller constructor
     */
    function __construct() {
        $this->openDatabaseConnection();
        $this->validation = new Validation();
    }
    /**
     * Open connection database sql
     */
    private function openDatabaseConnection() {
        $options = array(
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ, PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING
        );
        $this->db = new PDO(DB_TYPE . ':host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=' . DB_CHARSET, DB_USER, DB_PASS, $options);
    }
    /**
     * @return int
     */
    public function getCurrentMemberId() {
        return $_SESSION['current_member_id'];
    }
    /**
     * @param $view
     * @param bool $template
     */
    public function view($view, $template = true, $data = []) {
        if($template) {
            require APP . 'view/_templates/header.php';
        }
        require APP . 'view/' . $view . '.php';
        if($template) {
            require APP . 'view/_templates/footer.php';
        }
    }
}