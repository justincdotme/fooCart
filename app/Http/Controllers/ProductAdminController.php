<?php namespace fooCart\Http\Controllers;

use Exception;
use fooCart\Http\Requests;
use fooCart\Http\Requests\CreateProductRequest;
use fooCart\src\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use fooCart\Http\Controllers\Controller;
use fooCart\src\Product;
use fooCart\src\Manufacturer;
use fooCart\src\Category;
use fooCart\src\Tax;
use Illuminate\Support\Facades\Cache;

class ProductAdminController extends Controller {

    protected $_request;
    protected $_product;
    protected $_manufacturer;
    protected $_tax;
    protected $_category;

    public function __construct(Request $request, Product $product, Manufacturer $manufacturer, Tax $tax, Category $category)
    {
        $this->_request = $request;
        $this->_product = $product;
        $this->_manufacturer = $manufacturer;
        $this->_tax = $tax;
        $this->_category = $category;
    }

	/**
	 * Display a list of products.
     *
	 * @return Response
	 */
	public function index()
	{
        try {
            $products = Cache::rememberForever('all-products', function()
            {
                return $this->_product->getProductList();
            });
        } catch(Exception $e)
        {
            $products = null;
        }

        return view('admin.products')
            ->withProducts($products);
	}


    /**
     * Display the page for adding a new product.
     *
     * @return Response
     * @internal param Manufacturer $manufacturer
     * @internal param Category $category
     * @internal param Tax $tax
     */
	public function create()
	{
        try {
            $manufacturers = $this->_manufacturer->getJsonList();
            $categories = $this->_category->getJsonList();
            $taxRates = $this->_tax->getJsonList();
        } catch(Exception $e)
        {
            $manufacturers = null;
            $categories = null;
            $taxRates = null;
        }

        return view('admin.product-add-form')
            ->withManufacturers($manufacturers)
            ->withCategories($categories)
            ->withTax($taxRates);
	}

    /**
     * Store a newly created Product model in the DB.
     *
     * @param CreateProductRequest $request
     * @return Response
     */
	public function store(CreateProductRequest $request)
	{
        try {
            //Save the new product to the DB.
            $this->_product->fill($request->all());
            $this->_product->save();

            //Reset the cache.
            Cache::forget('all-products');
            Cache::forget('sale-products');

            Cache::rememberForever('all-products', function()
            {
                return $this->_product->getProductList();
            });
            Cache::rememberForever('sale-products', function()
            {
                return $this->_product->getSaleList();
            });

        } catch(Exception $e)
        {
            return redirect('admin/products');
        }
        return redirect('admin/products');
	}

    /**
     * Show the form for editing an existing product.
     *
     * @param $product_id
     * @return Response
     * @internal param int $id
     */
	public function edit($product_id)
	{
        try {
            $product = $this->_product->getProduct($product_id);

            //Ensure that there is a product
            if(!isset($product))
            {
                Throw new Exception;
            }
            $manufacturers = $this->_manufacturer->getJsonList();
            $categories = $this->_category->getJsonList();
            $tax = $this->_tax->getJsonList();
        } catch(Exception $e)
        {
            return redirect('admin/products');
        }

        return view('admin.product-edit-form')
            ->withManufacturers($manufacturers)
            ->withCategories($categories)
            ->withTax($tax)
            ->withProduct($product);
	}

    /**
     * Update an existing product.
     *
     * @param CreateProductRequest $request
     * @param $product_id
     * @return Response
     * @internal param int $id
     */
	public function update(CreateProductRequest $request, $product_id)
	{
        try {
            $product = $this->_product->findOrFail($product_id);
            $product->fill($request->all());

            //Prevent 0 value from being saved as sale_price
            if($request->sale_price === '' || $request->sale_price < 0.01)
            {
                $product->sale_price = null;
            }
            $product->save();

            //Reset the cache.
            Cache::forget('all-products');
            Cache::forget('sale-products');
            Cache::rememberForever('all-products', function()
            {
                return $this->_product->getProductList();
            });
            Cache::rememberForever('sale-products', function()
            {
                return $this->_product->getSaleList();
            });
        } catch(Exception $e)
        {
            return redirect('admin/products');
        }
        return redirect('admin/products');
	}

    /**
     * Delete the product model.
     * Delete the product image files.
     *
     * @param $product_id
     * @param ProductImage $productImage
     * @return Response
     * @internal param int $id
     */
	public function destroy($product_id, ProductImage $productImage)
	{
        try {
            //Delete the product images.
            //Note: the productImage models are automatically deleted though MySQL ON DELETE CASCADE
            $productImages = $productImage->where('product_id', '=', $product_id)->get();
            if($productImages)
            {
                foreach($productImages as $key => $image)
                {
                    $imageFile = $productImages[$key]->image_path;
                    unlink(public_path() . $imageFile);
                }
            }
            //Delete the product.
            $product = $this->_product->findOrFail($product_id);
            $product->delete();


            //Reset the cache.
            Cache::forget('all-products');
            Cache::forget('sale-products');
            Cache::rememberForever('all-products', function()
            {
                return $this->_product->getProductList();
            });
            Cache::rememberForever('sale-products', function()
            {
                return $this->_product->getSaleList();
            });
        } catch(Exception $e)
        {
            return redirect('admin/products');
        }
		return redirect('admin/products');
	}
}
