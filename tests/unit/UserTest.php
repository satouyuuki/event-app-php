<?php

class UserTest extends \PHPUnit\Framework\TestCase {
    protected $user;

    public function setUp():void {
        $this->user = new \App\Models\User;
    }

    /**
     * @test
     */
    public function ThatWeCanGetTheFirstName() {
        $this->user->setFirstName('Billy');
        $this->assertEquals($this->user->getFirstName(), 'Billy');
    }
    /**
     * @test
     */
    public function ThatWeCanGetTheLastName() {
        $this->user->setLastName('Garrett');
        $this->assertEquals($this->user->getLastName(), 'Garrett');
    }
    /**
     * @test
     */
    public function FullNameReturned() {
        $this->user->setFirstName('Billy');
        $this->user->setLastName('Garrett');

        $this->assertEquals($this->user->getFullName(), 'Billy Garrett');
    }
    /**
     * @test
     */
    public function FirstAndLastNameAreTrimmed() {
        $this->user->setFirstName('  Billy    ');
        $this->user->setLastName('  Garrett   ');

        $this->assertEquals($this->user->getFirstName(), 'Billy');
        $this->assertEquals($this->user->getLastName(), 'Garrett');
    }
    /**
     * @test
     */
    public function EmailAddressCanBeSet() {
        $this->user->setEmail('billy@codecource.com');
        $this->assertEquals($this->user->getEmail(), 'billy@codecource.com');
    }
    /**
     * @test
     */
    public function EmailVariablesContainCorrectValues() {
        $this->user->setFirstName('Billy');
        $this->user->setLastName('Garrett');
        $this->user->setEmail('billy@codecourse.com');

        $emailVariables = $this->user->getEmailVariables();
        $this->assertArrayHasKey('full_name', $emailVariables);
        $this->assertArrayHasKey('email', $emailVariables);

        $this->assertEquals($emailVariables['full_name'], 'Billy Garrett');
        $this->assertEquals($emailVariables['email'], 'billy@codecourse.com');
    }
}