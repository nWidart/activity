<?php
use Illuminate\Config\FileLoader;
use Illuminate\Config\Repository;
use Illuminate\Filesystem\Filesystem;
use Orchestra\Testbench\TestCase;
use Nwidart\Activity\Activity;
use Github\Client;
use Nwidart\Activity\Github\GithubEventFactory;

abstract class GithubBaseTest extends TestCase
{
    protected $activity;

    public function __construct()
    {
        $client = new Client;
        $factory = new GithubEventFactory;
        $configPath = __DIR__ . '../../../../config';
        // Init
        $files = new Filesystem;
        $loader = new FileLoader($files, $configPath);
        $config = new Repository($loader, 'development');

        $this->activity = new Activity($factory, $client, $config);
    }

    protected function getPackageProviders()
    {
        return array('Nwidart\Activity\ActivityServiceProvider');
    }

    protected function getPackageAliases()
    {
        return array('Cache' => 'Illuminate\Cache\Repository');
    }

    public function getActivities()
    {
        if (!Cache::has('github')) {
            $activities = $this->activity->forUser('nwidart')->activities(30);
            Cache::put('github', $activities, 1440);
        }
        return Cache::get('github', []);
    }
}