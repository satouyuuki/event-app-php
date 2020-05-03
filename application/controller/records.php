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
                $u_id = $this->refreshKyes($_POST, 'u_id');
                $text = $this->refreshKyes($_POST, 'text');
                for($i = 0; $i < count($u_id); $i++)  {
                    $recordModel->setUserId($u_id[$i]);
                    $recordModel->setText($text[$i]);
                    $recordModel->updateRecord();
                }
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
                $e_id = $this->refreshKyes($_POST, 'e_id');
                $text = $this->refreshKyes($_POST, 'text');
                for($i = 0; $i < count($e_id); $i++)  {
                    $recordModel->setEventId($e_id[$i]);
                    $recordModel->setText($text[$i]);
                    $recordModel->updateRecord();
                }

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
        if(is_array($id) and count($id) == 2) {
            $recordModel->setEventId($id[0]);
            $recordModel->setUserId($id[1]);
            $recordModel->deleteRecord();
            header('location: ' . URL . 'records/index/deleteSuc');
            exit();
        }else {
            header('location: ' . URL . 'problem');
            exit();
        }
    }

}