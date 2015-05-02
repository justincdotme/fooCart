<?php namespace fooCart\Http\Requests;

use fooCart\Http\Requests\Request;

class CreateMessageRequest extends Request {

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
            'sender_name' => 'required',
            'sender_email' => 'required|email',
            'sender_phone' => 'required',
        ];
	}

}
