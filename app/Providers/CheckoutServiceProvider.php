<?php namespace fooCart\Providers;

use Illuminate\Support\ServiceProvider;

class CheckoutServiceProvider extends ServiceProvider {

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
	 * Bind the Checkout implementation to the Checkout interface.
	 *
	 * @return void
	 */
	public function register()
	{
        $this->app->bind('fooCart\src\Checkout\Interfaces\CheckoutInterface', 'fooCart\src\Checkout\Checkout');
	}

}
