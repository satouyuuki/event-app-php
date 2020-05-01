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

}