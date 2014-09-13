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
        $rawData = [
            'id' => '2283614085',
            'type' => 'CreateEvent',
            'actor' => [
                'id' => 882397,
                'login' => 'nWidart',
                'gravatar_id' => '4d7a62a0ce8cc80c8d4e8721532a40ea',
                'url' => 'https://api.github.com/users/nWidart',
                'avatar_url' => 'https://avatars.githubusercontent.com/u/882397?'
            ],
            'repo' => [
                'id' => 23934307,
                'name' => 'nWidart/activity',
                'url' => 'https://api.github.com/repos/nWidart/activity'
            ],
            'payload' => [
                'ref' => 'master',
                'ref_type' => 'branch',
                'master_branch' => 'master',
                'description' => 'Activity lets you list your current activity on Github. Soon from Bitbucket as well.',
                'pusher_type' => 'user',
                'public' => true,
                'created_at' => '2014-09-11T20:22:15Z'
            ]
        ];

        $expected = [
            'time' => '4 hours ago',
            'actor' => 'nwidart',
            'actor_avatar' => '',
            'verb' => "created repository",
            'action_object' => 'ref',
            'target' => 'http://github.com/nwidart/repo'
        ];

        $this->assertEquals($expected, $this->createEvent->handle($rawData));
    }
}