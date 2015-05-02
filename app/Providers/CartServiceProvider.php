<?php namespace fooCart\Providers;

use Illuminate\Support\ServiceProvider;
use fooCart\src\Cart\Cart;

class CartServiceProvider extends ServiceProvider {

	/**
	 * Bootstrap the application services.
	 *
	 * @return void
	 */
	public function boot()
	{
		//
	}

	/**
	 * Bind the Cart implementation to the Cart interface.
	 *
	 * @return void
	 */
	public function register()
	{
        $this->app->bind('fooCart\src\Cart\Interfaces\CartInterface', function($app, $parameters)
        {
            return new Cart($parameters[0]);
        });
	}

}
