<?php namespace Nwidart\Activity;

use Github\Client;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\ServiceProvider;

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

        $this->app['activity'] = $this->app->share(function($app) {
            $driver = $app['config']->get('activity::driver');
            $factoryClassName = "Nwidart\\Activity\\{$driver}\\{$driver}EventFactory";

            $client = new Client;
            $factory = new $factoryClassName;

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
