<?php
namespace Application\controller;
use Application\model\Record;
use Application\core\Controller;

class records extends Controller {

    public function index() {
        $recordModel = new Record($this->db);
        $records = $recordModel->getAllRecords();
        require APP . 'view/_templates/header.php';
        require APP . 'view/records/index.php';
        require APP . 'view/_templates/footer.php';
    }
    public function eventRecord(...$id) {
        $id = $id[0];
        $recordModel = new Record($this->db);
        $records = $recordModel->getEventRecord($id);
        require APP . 'view/_templates/header.php';
        require APP . 'view/records/eventRecord.php';
        require APP . 'view/_templates/footer.php';
    }
    public function userRecord(...$id) {
        $id = $id[0];
        $recordModel = new Record($this->db);
        $records = $recordModel->getUserRecord($id);
        require APP . 'view/_templates/header.php';
        require APP . 'view/records/userRecord.php';
        require APP . 'view/_templates/footer.php';
    }

}