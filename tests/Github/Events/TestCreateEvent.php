<?php

use Nwidart\Activity\Github\Events\CreateEvent;

class TestCreateEvent extends \PHPUnit_Framework_TestCase
{
    protected $createEvent;

    public function setUp()
    {
        $this->createEvent = new CreateEvent();
    }
    /** @test */
    public function shouldReturnArray()
    {
        $rawData = [];
    }
}