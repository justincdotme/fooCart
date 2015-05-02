<?php namespace fooCart\Http\Controllers;

use fooCart\Http\Requests;
use fooCart\Http\Controllers\Controller;
use Illuminate\Http\Request;
use fooCart\src\Manufacturer;
use Exception;
use Illuminate\Support\Facades\Validator;

class ManufacturerController extends Controller {

    protected $_manufacturer;
    protected $_request;

    public function __construct(Request $request, Manufacturer $category)
    {
        $this->_manufacturer = $category;
        $this->_request = $request;
    }

	/**
	 * Return a list of manufacturers in JSON format.
	 *
	 * @return Response
	 */
	public function index()
	{
        try {
            return $this->_manufacturer->getJsonList();
        } catch(Exception $e)
        {
            return null;
        }

	}

    /**
     * Save a new Manufacturer model to the DB.
     *
     * @return Response
     * @internal param Request $request
     */
	public function store()
	{
        $validator = Validator::make($this->_request->all(),
            ['manufacturer' => 'required']
        );
        if($validator->fails())
        {
            return response()->json([
                'status' => 'required',
                'message' => 'manufacturer'
            ], 200);
        }
        try {
            $this->_manufacturer->fill($this->_request->all());
            $this->_manufacturer->save();
            $name = $this->_manufacturer->manufacturer;

            return response()->json(['status' => 'success', 'message' => $name]);
        } catch(Exception $e) {
            return response()->json(['status' => 'unique', 'message' => 'manufacturer']);
        }
	}
}
