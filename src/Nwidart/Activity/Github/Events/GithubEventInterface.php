<?php namespace Nwidart\Activity\Github\Events;

interface GithubEventInterface
{
    public function handle($eventData);
}
