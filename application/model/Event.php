<?php
namespace Application\model;
use Application\core\Model;

class Event extends Model {
    function __construct($db) {
        try {
            parent::__construct();
            $this->db = $db;
        }
        catch(PDOExeption $e) {
            exit('データベースに接続できませんでした。');
        }
    }

    public function getAllEvents($m_id) {
        return parent::getAllItems('events', $m_id);
    }

    public function getEvent($id, $mode = 'get') {
        return parent::getItem('events', $id, $mode);
    }

    public function deleteEvent($id) {
        $sql = "select DISTINCT e_id from records";
        $query = $this->db->prepare($sql);
        $query->execute();
        $results = $query->fetchAll();
        $flg = false;
        foreach($results as $result) {
            if($result->e_id === $id) {
                $flg = true;
                break;
            }
        }
        if($flg == false) {
            $sql = "delete from events where id = :id";
            $query = $this->db->prepare($sql);
            $parameters = array(
                ':id' => $id,
            );
            $query->execute($parameters);
        } else {
            return $flg;
        }
    }

    public function addEvent($post, $m_id) {
        $name = $post['name'];
        $date = $post['date'];
        $text = $post['text'];
        $sql = "insert into events (name, date, text, m_id) values (:name, :date, :text, :m_id)";
        $query = $this->db->prepare($sql);
        $parameters = array(
            ':name' => $name,
            ':date' => $date,
            ':text' => $text,
            ':m_id' => $m_id,
        );
        $query->execute($parameters);
        // return $query->fetchAll();
    }

    public function editEvent($post, $id) {
        $name = $post['name'];
        $date = $post['date'];
        $text = $post['text'];
        $sql = "update events set name=:name, date=:date, text=:text where id=:id";

        $query = $this->db->prepare($sql);
        $parameters = array(
            ':name' => $name,
            ':date' => $date,
            ':text' => $text,
            ':id' => $id,
        );
        return $query->execute($parameters);
    }

}