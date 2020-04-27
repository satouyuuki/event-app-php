<?php
namespace Application\model;

class Member {
    function __construct($db) {
        try {
            $this->db = $db;
        }
        catch(PDOExeption $e) {
            exit('データベースに接続できませんでした。');
        }
    }

    public function login($email, $pwd) {
        $sql = "select * from members where email = :email";
        $query = $this->db->prepare($sql);
        $parameters = array(
            ':email' => $email,
        );
        $query->execute($parameters);
        $member = $query->fetch();
        if($member and password_verify($pwd, $member->password)) {
            return $member;
        }
        else {
            return null;
        }
    }

    public function signin($email, $pwd) {
        $sql = "insert into members (email, password) values (:email, :password)";
        $query = $this->db->prepare($sql);
        $parameters = array(
            ':email' => $email,
            ':password' => password_hash($pwd, PASSWORD_DEFAULT)
        );
        $query->execute($parameters);
    }

}