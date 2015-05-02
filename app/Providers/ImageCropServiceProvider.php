<?php namespace fooCart\Providers;

use Illuminate\Support\ServiceProvider;
use fooCart\src\Image\ImageCropper;
class ImageCropServiceProvider extends ServiceProvider {

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
	 * Bind the ImageCrop implementation with the ImageCrop interface.
	 *
	 * @return void
	 */
	public function register()
	{
        $this->app->bind('fooCart\src\Image\Interfaces\ImageCropInterface', 'fooCart\src\Image\ImageCropper');
	}

}
