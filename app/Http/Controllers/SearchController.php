<?php namespace fooCart\Http\Controllers;

use fooCart\Http\Requests;
use fooCart\Http\Controllers\Controller;
use fooCart\src\Manufacturer;
use fooCart\src\Product;
use Illuminate\Http\Request;

class SearchController extends Controller {

    protected $_request;
    protected $_paginateCount;
    protected $_product;
    protected $_manufacturer;

    public function __construct(Request $request, Product $product, Manufacturer $manufacturer)
    {
        $this->_request = $request;
        $this->_paginateCount = 10;
        $this->_product = $product;
        $this->_manufacturer = $manufacturer;
    }

    /**
     * Display the search results.
     * Query the Product model for results..
     * If no result, query the Manufacturer model.
     *
     * @return Response
     * @internal param Request $request
     */
	public function index()
	{
        $query = $this->_request->input('query');
        $results = $this->_product->search($query, $this->_paginateCount);

        if($results->isEmpty())
        {
            $results = $this->_manufacturer->search($query, $this->_paginateCount);
            if(!$results->isEmpty())
            {
                $manufacturerId = $results->first()->manufacturer_id;
                $results = $this->_product->searchByManufacturer($manufacturerId, $this->_paginateCount);
            }
        }
        return view('public.search-results')
            ->withResults($results)
            ->withQuery($query);
	}
}
