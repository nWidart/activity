<?php namespace Nwidart\Activity\Github\Events;

use Nwidart\Activity\EventInterface;

class CreateEvent extends BaseEventClass implements EventInterface
{
    public function handle($eventData)
    {
        return [
            'time' => $this->getDate($eventData['created_at']),
            'actor' => $eventData['actor']['login'],
            'actor_avatar' => $eventData['actor']['avatar_url'],
            'verb' => "created {$eventData['payload']['ref_type']}",
            'action_object' => $eventData['payload']['ref'],
            'target' => $this->getGithubUrl($eventData['repo']['name'])
        ];
    }
}
