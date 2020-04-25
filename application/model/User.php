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
}