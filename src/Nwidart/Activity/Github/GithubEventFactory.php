<?php namespace Nwidart\Activity\Github;

use Nwidart\Activity\EventFactoryInterface;

class GithubEventFactory implements EventFactoryInterface
{
    public function make($eventType)
    {
        $class = "Nwidart\\Activity\\Github\\Events\\$eventType";

        return new $class;
    }
}