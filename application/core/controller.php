<?php
namespace Application\core;
use PDO;
use Application\utility\Utility;

class Controller extends Utility {
    public $db = null;

    /**
     * Controller constructor
     */
    function __construct() {
        $this->openDatabaseConnection();
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
        // $utility = new Utility();
        if($template) {
            require APP . 'view/_templates/header.php';
        }
        require APP . 'view/' . $view . '.php';
        if($template) {
            require APP . 'view/_templates/footer.php';
        }
    }
}