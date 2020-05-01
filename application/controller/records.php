<?php
namespace Application\controller;
use Application\model\Record;
use Application\core\Controller;

class records extends Controller {

    public function index(...$params) {
        $delResult = '';
        if(!empty($params) && is_string($params[0])) {
            $delResult = $params[0];
        }
        $m_id = $this->getCurrentMemberId();
        $recordModel = new Record($this->db);
        $recordModel->setMemberId($m_id);
        $records = $recordModel->getAllRecords();
        $this->view(
            $view = 'records/index',
            $template = true, 
            $data = compact(
                'records',
                'delResult'
            )
        );
    }
    public function eventRecord(...$params) {
        if(!empty($params)) {
            $mode = 'get';
            foreach($params as $value) {
                if($value == 'edit') {
                    $mode = $value;
                    break;
                }
            }
            $e_id = $params[0];
            $recordModel = new Record($this->db);
            $recordModel->setEventId($e_id);
            if($_POST) {
                $records = $recordModel->updateEventRecord($_POST);
                header('location: ' . URL . "/records/eventRecord/$e_id");
                exit();
            }
            // 画面表示
            $records = $recordModel->getEventRecord($mode);
            $this->view(
                $view = 'records/eventRecord',
                $template = true, 
                $data = compact(
                    'records',
                    'mode'
                )
            );
        }
        else {
            header('location: ' . URL . 'problem');
            exit();
        }
    }
    public function userRecord(...$params) {
        if(!empty($params)) {
            $mode = 'get';
            foreach($params as $value) {
                if($value == 'edit') {
                    $mode = $value;
                    break;
                }
            }
            $u_id = $params[0];
            $recordModel = new Record($this->db);
            $recordModel->setUserId($u_id);
            if($_POST) {
                $records = $recordModel->updateUserRecord($_POST);
                header('location: ' . URL . "/records/userRecord/$u_id");
                exit();
            }
            // 画面表示
            $records = $recordModel->getUserRecord($mode);
            $this->view(
                $view = 'records/userRecord',
                $template = true, 
                $data = compact(
                    'records',
                    'mode'
                )
            );
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