<?php
namespace Application\model;

class User {
    function __construct($db) {
        try {
            $this->db = $db;
        }
        catch(PDOExeption $e) {
            exit('データベースに接続できませんでした。');
        }
    }

    public function getAllUsers() {
        $sql = "select * from users";
        $query = $this->db->prepare($sql);
        $parameters = array();
        $query->execute($parameters);
        return $query->fetchAll();
    }
    public function getUser($id) {

        $sql = "select * from users where id = :id";
        $query = $this->db->prepare($sql);
        $parameters = array(
            ':id' => $id,
        );
        $query->execute($parameters);
        return $query->fetchAll();
    }

    public function deleteUser($id) {
        $sql = "delete from users where id = :id";
        $query = $this->db->prepare($sql);
        $parameters = array(
            ':id' => $id,
        );
        return $query->execute($parameters);
    }

    public function addUser($post) {
        $name = $post['name'];
        $date = $post['date'];
        $text = $post['text'];
        $sql = "insert into users (name, date, text) values (:name, :date, :text)";
        $query = $this->db->prepare($sql);
        $parameters = array(
            ':name' => $name,
            ':date' => $date,
            ':text' => $text,
        );
        $query->execute($parameters);
        return $query->fetchAll();
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