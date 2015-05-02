<?php namespace fooCart\Http\Requests;

use fooCart\Http\Requests\Request;

class SubmitOrderRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
        return [
            'first_name' => 'required',
            'last_name' => 'required',
            'home_phone' => 'required',
            'addr_street_1' => 'required',
            'addr_city' => 'required',
            'addr_state' => 'required',
            'addr_zip' => 'required'
        ];
	}

}
