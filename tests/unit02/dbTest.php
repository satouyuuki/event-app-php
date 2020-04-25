<?php

class dbTest extends \PHPUnit\Framework\TestCase {

    // public function setUp():void {
    //     $events = new events();
    // }

    /**
     * @test
     */
    public function db_check_get() {
        $events = new Application\controller\events();
        $this->assertEmpty($event->index());
    }
}