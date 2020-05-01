<?php
// require 'application/config/config.php';
use Application\model\Event;
// use Application\core\Controller;
// use PDO;
// use Application\utility\Utility;

class dbTest extends \PHPUnit\Framework\TestCase {

    // public function setUp():void {
    //     $events = new events();
    // }
    // public $db = null;

    /**
     * @test
     */
    public function db_pdo() {
        $event = new Event();
        $event->setName('test');
        $this->assertEquals('test', $event->getName());
    }
}