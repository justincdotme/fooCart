<?php namespace fooCart\Providers;

use Illuminate\Support\ServiceProvider;
use Session;

class ComposerServiceProvider extends ServiceProvider {

	/**
	 * Bootstrap the application services.
	 *
	 * @return void
	 */
	public function boot()
	{
        $this->app['view']->composer('public.layouts.main',function($view){
            $view->total = Session::get('cartTotal', '0.00');
        });
	}

	/**
	 * Register the application services.
	 *
	 * @return void
	 */
	public function register()
	{
		//
	}

}
