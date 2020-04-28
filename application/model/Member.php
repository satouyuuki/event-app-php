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

    private function searchMail($email) {
        $sql = "select * from members where email = :email";
        $query = $this->db->prepare($sql);
        $parameters = array(
            ':email' => $email,
        );
        echo "hello";
        $query->execute($parameters);
        return $query->fetch();
    }

    public function login($email, $pwd) {
        $member = $this->searchMail($email);
        if($member and password_verify($pwd, $member->password)) {
            return $member;
        }
        else {
            return null;
        }
    }

    public function signin($email, $pwd) {
        $member = $this->searchMail($email);
        if($member) {
            return null;
        }
        else {
            $sql = "insert into members (email, password) values (:email, :password)";
            $query = $this->db->prepare($sql);
            $parameters = array(
                ':email' => $email,
                ':password' => password_hash($pwd, PASSWORD_DEFAULT)
            );
            return $query->execute($parameters);
        }
    }

}