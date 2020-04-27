<?php
namespace Application\controller;
use Application\model\Record;
use Application\core\Controller;

class records extends Controller {

    public function index(...$error) {
        $recordModel = new Record($this->db);
        $records = $recordModel->getAllRecords();
        require APP . 'view/_templates/header.php';
        require APP . 'view/records/index.php';
        require APP . 'view/_templates/footer.php';
    }
    public function eventRecord(...$id) {
        if(!empty($id)) {
            $recordModel = new Record($this->db);
            $e_id = $id[0];
            if($_POST) {
                $records = $recordModel->updateEventRecord($_POST, $e_id);
                header('location: ' . URL . "/records/eventRecord/$e_id");
                exit();
            }
            $editFlg = false;
            foreach($id as $value) {
                if($value == 'edit') {
                    $editFlg = true;
                    break;
                }
            }
            // 画面表示
            $records = $recordModel->getEventRecord($e_id);
            require APP . 'view/_templates/header.php';
            require APP . 'view/records/eventRecord.php';
            require APP . 'view/_templates/footer.php';
        }
        else {
            header('location: ' . URL . 'problem');
            exit();
        }
    }
    public function userRecord(...$id) {
        if(!empty($id)) {
            $recordModel = new Record($this->db);
            $u_id = $id[0];
            if($_POST) {
                $records = $recordModel->updateUserRecord($_POST, $u_id);
                header('location: ' . URL . "/records/userRecord/$u_id");
                exit();
            }
            $editFlg = false;
            foreach($id as $value) {
                if($value == 'edit') {
                    $editFlg = true;
                    break;
                }
            }
            // 画面表示
            $records = $recordModel->getUserRecord($u_id);
            require APP . 'view/_templates/header.php';
            require APP . 'view/records/userRecord.php';
            require APP . 'view/_templates/footer.php';
        }
        else {
            header('location: ' . URL . 'problem');
            exit();
        }
    }
    public function delete(...$id) {
        $recordModel = new Record($this->db);
        $recordModel->deleteRecord($id);

        if($id[0] === "all") {
            header('location: ' . URL . 'records/index/deleteAll');
        } else {
            header('location: ' . URL . 'records/index/deleteSuc');
        }
        exit();
    }

}