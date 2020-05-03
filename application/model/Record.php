<?php
namespace Application\model;
use Application\core\Model;

class Record extends Model {
    function __construct($db) {
        try {
            parent::__construct();
            $this->db = $db;
        }
        catch(PDOExeption $e) {
            exit('データベースに接続できませんでした。');
        }
    }

    public function addRecord() {
        $e_id = $this->getEventId();
        $u_id = $this->getUserId();
        $text = $this->getText();
        $sql = "insert into records (e_id, u_id, text) values (:e_id, :u_id, :text)";
        $query = $this->db->prepare($sql);
        $parameters = array(
            ':e_id' => $e_id,
            ':u_id' => $u_id,
            ':text' => $text
        );
        $query->execute($parameters);
    }
    
    public function getAllRecords() {
        $m_id = $this->getMemberId();
        $sql = "
        select u.id as u_id, e.id as e_id, u.name as u_name, e.name as e_name
        from users as u 
        inner join records as r on u.id = r.u_id 
        and u.m_id = :m_id
        inner join events as e on r.e_id = e.id 
        and e.m_id = :m_id
        ";
        $query = $this->db->prepare($sql);
        $parameters = array(
            ':m_id' => $m_id
        );
        $query->execute($parameters);
        return $query->fetchAll();
    }
    public function getEventRecord($mode = 'get') {
        $e_id = $this->getEventId();
        $sql = "
        select DISTINCT r.text, e.id as e_id, u.id as u_id, u.name as u_name, e.name as e_name  
        from users as u 
        inner join records as r on u.id = r.u_id 
        inner join events as e on r.e_id = e.id 
        where e_id = :e_id";
        $query = $this->db->prepare($sql);
        $parameters = array(
            ':e_id' => $e_id
        );
        $query->execute($parameters);
        $results = $query->fetchAll();
        if ($mode != 'edit') {
            foreach($results as $result) {
                $result->text = $this->parser->parse($result->text);
            }
        }
        return $results;
    }
    public function getUserRecord($mode = 'get') {
        $u_id = $this->getUserId();
        $sql = "select DISTINCT r.text, u.id as u_id, e.id as e_id, u.name as u_name, e.name as e_name  
        from users as u 
        inner join records as r on u.id = r.u_id 
        inner join events as e on r.e_id = e.id 
        where u_id = :u_id";
        $query = $this->db->prepare($sql);
        $parameters = array(
            ':u_id' => $u_id
        );
        $query->execute($parameters);
        $results = $query->fetchAll();
        if ($mode != 'edit') {
            foreach($results as $result) {
                $result->text = $this->parser->parse($result->text);
            }
        }
        return $results;
    }
    public function deleteRecord() {
        $e_id = $this->getEventId();
        $u_id = $this->getUserId();
        $sql = "delete from records where e_id = :e_id and u_id = :u_id";
        $query = $this->db->prepare($sql);
        $parameters = array(
            ':e_id' => $e_id,
            ':u_id' => $u_id,
        );
        $query->execute($parameters);
    }
    public function updateRecord() {
        $e_id = $this->getEventId();
        $u_id = $this->getUserId();
        $text = $this->getText();
        $sql = "
        update records set 
        text = :text
        where e_id = :e_id and u_id = :u_id
        ";
        $query = $this->db->prepare($sql);
        $parameters = array(
            ':text' => $text,
            ':e_id' => $e_id,
            ':u_id' => $u_id,
        );
        $query->execute($parameters);
    }

}