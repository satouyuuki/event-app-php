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
        if($member and $member->password = hash('sha256', $pwd)) {
            return $member;
        }
        else {
            return null;
        }
    }

}