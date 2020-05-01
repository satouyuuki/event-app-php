<?php
namespace Application\model;
use Application\core\Model;

class User extends Model{
    function __construct($db = null) {
        parent::__construct($db);
    }

    public function getAllUsers() {
        return parent::getAllItems('users');
    }

    public function getUser($mode = 'get') {
        $id = $this->getUserId();
        return parent::getItem('users', $mode, $id);
    }

    public function addUser() {
        parent::addItem('users');
    }

    public function deleteUser() {
        $id = $this->getUserId();
        parent::deleteItem('users', $id);
    }

    public function editUser() {
        $id = $this->getUserId();
        return parent::editItem('users', $id);
    }

    public function addEventUser() {
        $name = $this->getName();
        $m_id = $this->getMemberId();
        $sql = "insert into users (name, m_id) values (:name, :m_id)";
        $query = $this->db->prepare($sql);
        $parameters = array(
            ':name' => $name,
            ':m_id' => $m_id,
        );
        $query->execute($parameters);
    }

    public function getAllUsersIsNotEvent() {
        $m_id = $this->getMemberId();
        $e_id = $this->getEventId();
        $sql = "
        select * from users 
        where id not in 
        (select u_id from records where e_id=:e_id) 
        and m_id = :m_id";
        $query = $this->db->prepare($sql);
        $parameters = array(
            ':e_id' => $e_id,
            ':m_id' => $m_id,
        );
        $query->execute($parameters);
        return $query->fetchAll();
    }


}