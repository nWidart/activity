<?php namespace Nwidart\Activity\Github\Events;

use Github\Client;

class PushEvent extends BaseEventClass implements GithubEventInterface
{
    public function handle($eventData)
    {
        $link = $this->getCommitLink($eventData['actor']['login'], $this->getRepositoryName($eventData['repo']['name']), $eventData['payload']['head']);
        return [
            'time' => $this->getDate($eventData['created_at']),
            'actor' => $eventData['actor']['login'],
            'actor_avatar' => $eventData['actor']['avatar_url'],
            'verb' => 'pushed to ',
            'action_object' => $eventData['repo']['name'],
            'target' => $link
        ];
    }

    private function getCommitLink($username, $repository, $ref)
    {
        $client = new Client;

        return $client->api('repo')->commits()->show($username, $repository, $ref)['html_url'];
    }

    private function getRepositoryName($fullRepoName)
    {
        return explode('/', $fullRepoName)[1];
    }
}
