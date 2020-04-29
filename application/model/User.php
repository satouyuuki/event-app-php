<?php
namespace Application\model;
use Application\core\Model;

class User extends Model{
    function __construct($db) {
        try {
            parent::__construct();
            $this->db = $db;
        }
        catch(PDOExeption $e) {
            exit('データベースに接続できませんでした。');
        }
    }

    public function getAllUsers($m_id) {
        return parent::getAllItems('users', $m_id);
    }
    public function getUser($id, $mode = 'get') {
        return parent::getItem('users', $id, $mode);
    }

    public function deleteUser($id) {
        $sql = "select DISTINCT u_id from records";
        $query = $this->db->prepare($sql);
        $query->execute();
        $results = $query->fetchAll();
        $flg = false;
        foreach($results as $result) {
            if($result->u_id === $id) {
                $flg = true;
                break;
            }
        }
        if($flg == false) {
            $sql = "delete from users where id = :id";
            $query = $this->db->prepare($sql);
            $parameters = array(
                ':id' => $id,
            );
            $query->execute($parameters);
        } else {
            return $flg;
        }

    }

    public function addUser($post, $m_id) {
        $name = $post['name'];
        $date = $post['date'];
        $text = $post['text'];
        $sql = "insert into users (name, date, text, m_id) values (:name, :date, :text, :m_id)";
        $query = $this->db->prepare($sql);
        $parameters = array(
            ':name' => $name,
            ':date' => $date,
            ':text' => $text,
            ':m_id' => $m_id,
        );
        $query->execute($parameters);
    }

    public function addEventUser($post, $m_id) {
        $name = $post['name'];
        $sql = "insert into users (name, m_id) values (:name, :m_id)";
        $query = $this->db->prepare($sql);
        $parameters = array(
            ':name' => $name,
            ':m_id' => $m_id,
        );
        $query->execute($parameters);
    }

    public function editUser($post, $id) {
        $name = $post['name'];
        $date = $post['date'];
        $text = $post['text'];
        $sql = "update users set name=:name, date=:date, text=:text where id=:id";

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