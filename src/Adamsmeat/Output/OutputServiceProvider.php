<?php namespace Adamsmeat\Output;

use Illuminate\Support\ServiceProvider;
use Michelf\Markdown;

class OutputServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	/**
	 * Bootstrap the application events.
	 *
	 * @return void
	 */
	public function boot()
	{
		$this->package('adamsmeat/output');
		require __DIR__.'/../../routes.php';
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
        $this->app['output.markdown'] = $this->app->share(function($app)
        {
			return new Markdown();
        });	

        $this->app['output'] = $this->app->share(function($app)
        {
            return new Output($app['config'], $app['view'], $app['output.markdown']);
        });		
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array('output');
	}

}