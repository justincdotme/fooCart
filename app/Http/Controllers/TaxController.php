<?php namespace fooCart\Http\Controllers;

use fooCart\Http\Requests;
use fooCart\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Exception;
use fooCart\src\Tax;

class TaxController extends Controller {

    protected $_tax;
    protected $_request;

    public function __construct(Request $request, Tax $tax)
    {
        $this->_tax = $tax;
        $this->_request = $request;
    }

	/**
	 * Return a list of tax rates in JSON format.
	 *
	 * @return Response
	 */
	public function index()
	{
        try {
            return $this->_tax->getJsonList();
        } catch(Exception $e)
        {
            return null;
        }
	}

    /**
     * Save a new Tax model to the DB.
     *
     * @return Response
     * @internal param Request $request
     */
	public function store()
	{
        $validator = Validator::make($this->_request->all(),
            ['tax' => 'required']
        );
        if($validator->fails())
        {
            return response()->json([
                'status' => 'required',
                'message' => 'tax'
                ], 200);
        }
        try {
            $this->_tax->fill($this->_request->all());
            $this->_tax->save();
            $rate = $this->_tax->tax;

            return response()->json(['status' => 'success', 'message' => $rate]);
        } catch(Exception $e) {
            return response()->json(['status' => 'unique', 'message' => 'An error has occurred']);
        }
	}
}
