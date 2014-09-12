<?php namespace Nwidart\Activity;

use Github\Client;
use Illuminate\Support\ServiceProvider;
use Nwidart\Activity\Github\GithubEventFactory;

class ActivityServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->package('nwidart/activity');

        $this->app->bind(
            'Nwidart\Activity\EventFactoryInterface',
            'Nwidart\Activity\Github\GithubEventFactory'
        );

        $this->app['activity'] = $this->app->share(function() {
            $client = new Client;
            $factory = new GithubEventFactory;

            return new Activity($factory, $client);
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return array('activity');
    }

}
