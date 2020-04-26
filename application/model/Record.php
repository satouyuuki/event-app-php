<?php
namespace Application\model;

class Record {
    function __construct($db) {
        try {
            $this->db = $db;
        }
        catch(PDOExeption $e) {
            exit('データベースに接続できませんでした。');
        }
    }

    public function addRecord($post, $e_id) {
        $e_id = $e_id;
        $u_id = $_POST['users'];
        $name = $_POST['name'];
        $text = $_POST['text'];
        if($u_id == -1) {
            $sql = "insert into users (name) values (:name)";
            $parameters = array(
                ':name' => $name,
            );

            $query = $this->db->prepare($sql);
            $query->execute($parameters);
            $u_id = (int)$this->db->lastInsertId();
        } 
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

        $sql = "select u.id as u_id, e.id as e_id, u.name as u_name, e.name as e_name  from users as u inner join records as r on u.id = r.u_id inner join events as e on r.e_id = e.id";
        $query = $this->db->prepare($sql);
        $parameters = array();
        $query->execute($parameters);
        return $query->fetchAll();
    }
    public function getEventRecord($id) {
        $sql = "select DISTINCT r.text, e.id as e_id, u.name as u_name, e.name as e_name  from users as u inner join records as r on u.id = r.u_id inner join events as e on r.e_id = e.id where e_id = :id";
        $query = $this->db->prepare($sql);
        $parameters = array(
            ':id' => $id
        );
        $query->execute($parameters);
        return $query->fetchAll();
    }
    public function getUserRecord($id) {
        $sql = "select DISTINCT r.text, u.id as u_id, u.name as u_name, e.name as e_name  from users as u inner join records as r on u.id = r.u_id inner join events as e on r.e_id = e.id where u_id = :id";
        $query = $this->db->prepare($sql);
        $parameters = array(
            ':id' => $id
        );
        $query->execute($parameters);
        return $query->fetchAll();
    }
}