<?php
namespace Application\model;
use Application\core\Model;

class Event extends Model {
    function __construct($db = null) {
        parent::__construct($db);
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
        return parent::editItem('events', $id);
    }

}