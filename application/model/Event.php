<?php
namespace Application\model;
use Application\core\Model;

class Event extends Model {
    function __construct($db = null) {
        parent::__construct($db);
    }

    public function addEventAPI() { 
        $name = $this->getName();
        $date = $this->getDate();
        $m_id = $this->getMemberId();
        $sql = "insert into events
        (name, date, m_id) values 
        (:name, :date, :m_id)
        on duplicate key update date = :date";
        $query = $this->db->prepare($sql);
        $parameters = array(
            ':name' => $name,
            ':date' => $date,
            ':m_id' => $m_id,
        );
        return $query->execute($parameters);
    }

    public function getAllEvents() {
        return parent::getAllItems('events');
    }

    public function getEvent($mode = 'get') {
        $id = $this->getEventId();
        return parent::getItem('events', $mode, $id);
    }

    public function addEvent() {
        parent::addItem('events');
    }

    public function deleteEvent() {
        $id = $this->getEventId();
        parent::deleteItem('events', $id);
    }

    public function editEvent() {
        $id = $this->getEventId();
        parent::editItem('events', $id);
    }

    public function checkEventId() {
        $e_id = $this->getEventId();
        $sql = "select e_id from records where e_id = :e_id";
        $query = $this->db->prepare($sql);
        $parameters = array(
            ':e_id' => $e_id
        );
        $query->execute($parameters);
        return $query->fetchAll();
    }

}