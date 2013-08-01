<?php namespace Digithis\Activehelper;

use Illuminate\Support\ServiceProvider;

class ActivehelperServiceProvider extends ServiceProvider {

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
	   $this->package('digithis/activehelper');
	 }
 
	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		$this->app['activehelper'] = $this->app->share(function($app)
		{
			return new Activehelper;
		});
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array('activehelper');
	}

}