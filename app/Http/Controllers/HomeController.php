<?php namespace fooCart\Http\Controllers;

use Exception;
use fooCart\Http\Requests;
use fooCart\Http\Controllers\Controller;
use fooCart\src\Product;
use Illuminate\Http\Request;
use fooCart\src\Slideshow;
use Illuminate\Support\Facades\Cache;

class HomeController extends Controller {

    protected $_product;
    protected $_slideshow;

    public function __construct(Product $product, Slideshow $slideshow)
    {
        $this->_product = $product;
        $this->_slideshow = $slideshow;
    }

	/**
	 * Display the home page.
     * Send slideshow to home page.
     * Send on-sale list to home page
	 *
	 * @return Response
	 */

	public function index()
	{
        //Get the slideshow
        try {
            $slideshow = Cache::rememberForever('slides', function()
            {
                return $this->_slideshow->getSlideshow(1);
            });
        } catch(Exception $e)
        {
            $slideshow = null;
        }

        //Get the list of sale products
        try {
            $saleList = Cache::rememberForever('sale-products-home', function()
            {
                return $this->_product->getHomePageSaleList();
            });
        }catch(Exception $e)
        {
            $saleList = null;
        }

        return view('public.home')
            ->withSlides($slideshow)
            ->withSales($saleList);
	}
}
