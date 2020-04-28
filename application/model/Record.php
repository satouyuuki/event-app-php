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
        $u_id = $post['users'];
        $name = $post['name'];
        $text = $post['text'];
        $sql = "insert into records (e_id, u_id, text) values (:e_id, :u_id, :text)";
        $query = $this->db->prepare($sql);
        $parameters = array(
            ':e_id' => $e_id,
            ':u_id' => $u_id,
            ':text' => $text
        );
        $query->execute($parameters);
    }
    public function getAllRecords($m_id) {
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
    public function getEventRecord($id) {
        $sql = "select DISTINCT r.text, e.id as e_id, u.id as u_id, u.name as u_name, e.name as e_name  from users as u inner join records as r on u.id = r.u_id inner join events as e on r.e_id = e.id where e_id = :id";
        $query = $this->db->prepare($sql);
        $parameters = array(
            ':id' => $id
        );
        $query->execute($parameters);
        return $query->fetchAll();
    }
    public function getUserRecord($id) {
        $sql = "select DISTINCT r.text, u.id as u_id, e.id as e_id, u.name as u_name, e.name as e_name  from users as u inner join records as r on u.id = r.u_id inner join events as e on r.e_id = e.id where u_id = :id";
        $query = $this->db->prepare($sql);
        $parameters = array(
            ':id' => $id
        );
        $query->execute($parameters);
        return $query->fetchAll();
    }
    public function deleteRecord($id) {
        foreach($id as $value) {
            if($value === "all") {
                $sql = "delete from records";
                $query = $this->db->prepare($sql);
                $query->execute();
                break;
            }
        }
        $e_id = $id[0];
        $u_id = $id[1];
        $sql = "delete from records where e_id = :e_id and u_id = :u_id";
        $query = $this->db->prepare($sql);
        $parameters = array(
            ':e_id' => $e_id,
            ':u_id' => $u_id,
        );
        $query->execute($parameters);
    }
    public function updateEventRecord($post, $e_id) {
        $u_id = $this->refreshKyes($post, 'u_id');
        $text = $this->refreshKyes($post, 'text');
        for($i = 0; $i < count($text); $i++) {
            $sql = "
            update records set 
            text = :text
            where e_id = :e_id and u_id = :u_id
            ";
            $query = $this->db->prepare($sql);
            $parameters = array(
                ':text' => $text[$i],
                ':e_id' => $e_id,
                ':u_id' => $u_id[$i],
            );
            $query->execute($parameters);
        }
    }

    public function updateUserRecord($post, $u_id) {
        $e_id = $this->refreshKyes($post, 'e_id');
        $text = $this->refreshKyes($post, 'text');
        for($i = 0; $i < count($text); $i++) {
            $sql = "
            update records set 
            text = :text
            where u_id = :u_id and e_id = :e_id
            ";
            $query = $this->db->prepare($sql);
            $parameters = array(
                ':text' => $text[$i],
                ':u_id' => $u_id,
                ':e_id' => $e_id[$i],
            );
            $query->execute($parameters);
        }
    }
    private function refreshKyes(array $post, string $preg) {
        $flipped_array = array_flip($post);
        $flipped_post = preg_grep("!{$preg}[0-9+]!",$flipped_array);
        $result = array_flip($flipped_post);
        return $result = array_values($result);
    }
}