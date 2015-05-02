<?php namespace fooCart\Http\Controllers;

use fooCart\Http\Requests;
use fooCart\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Exception;
use fooCart\src\Category;

class CategoryController extends Controller {

    protected $_category;
    protected $_request;

    public function __construct(Request $request, Category $category)
    {
        $this->_category = $category;
        $this->_request = $request;
    }

	/**
	 * Return a list of categories in JSON format.
	 *
	 * @return Response
	 */
	public function index()
	{
        try {
            return $this->_category->getJsonList();
        } catch(Exception $e)
        {
            return null;
        }
	}

    /**
     * Save a new Category model to the DB.
     *
     * @return Response
     * @internal param Request $request
     */
	public function store()
	{
        $validator = Validator::make($this->_request->all(),
            ['category' => 'required']
        );
        if($validator->fails())
        {
            return response()->json([
                'status' => 'required',
                'message' => 'category'
            ], 200);
        }
        try {
            $this->_category->fill($this->_request->all());
            $this->_category->save();
            $name = $this->_category->category;

            return response()->json(['status' => 'success', 'message' => $name]);

        } catch(Exception $e) {

            return response()->json(['status' => 'unique', 'message' => 'category']);

        }
	}
}
