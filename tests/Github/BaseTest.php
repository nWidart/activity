<?php

use Nwidart\Activity\Activity;
use Github\Client;
use Nwidart\Activity\Github\GithubEventFactory;

abstract class GithubBaseTest extends \PHPUnit_Framework_TestCase
{
    protected $activity;

    public function __construct()
    {
        $client = new Client;
        $factory = new GithubEventFactory();

        $this->activity = new Activity($factory, $client);
    }
}