<?php namespace Nwidart\Activity;

use Github\Client;
use Github\HttpClient\Message\ResponseMediator;
use Illuminate\Config\Repository;
use Illuminate\Support\Facades\Config;

class Activity
{
    protected $user;

    /**
     * @var EventFactoryInterface
     */
    private $eventFactory;
    /**
     * @var Client
     */
    private $client;
    /**
     * @var Repository
     */
    private $config;

    public function __construct(EventFactoryInterface $eventFactory, Client $client, Repository $config)
    {
        $this->eventFactory = $eventFactory;
        $this->client = $client;
        $this->config = $config;
        $this->client->authenticate($this->config->get('activity::github.token'), 'http_token');
    }

    public function forUser($user)
    {
        $this->user = $user;

        return $this;
    }

    public function activities($limit = 5)
    {
        $rawActivities = $this->getRawActivities($limit);

        $cleanedActivities = [];
        foreach ($rawActivities as $rawActivity) {
            $cleanedActivities[] = $this->eventFactory->make($rawActivity['type'])->handle($rawActivity);
        }

        return $cleanedActivities;
    }

    private function getRawActivities($limit = 5)
    {
        $response = $this->client->getHttpClient()->get("users/{$this->user}/events");

        $activities = ResponseMediator::getContent($response);

        return array_slice($activities, 0, $limit);
    }
}
