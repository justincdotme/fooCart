<?php namespace fooCart\Http\Controllers;

use Exception;
use fooCart\Http\Requests;
use fooCart\Http\Controllers\Controller;

use fooCart\Http\Requests\CreateMessageRequest;
use fooCart\src\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Mail;

class MessageController extends Controller {

    protected $_message;
    protected $_request;

    public function __construct(Message $message, Request $request)
    {
        $this->_message = $message;
        $this->_request = $request;
    }

    /**
     * Display the message list page.
     * Send message list to messages page.
     *
     * @return Response
     */
	public function index()
	{
        try {
            $messages = $this->_message->getSortedMessages();
        } catch(Exception $e)
        {
            $messages = null;
        }

        return view('admin.messages')
            ->withMessages($messages);
	}

    /**
     * Save the message to the database.
     * Send confirmation email to customer.
     * Send customer info to website administrator.
     *
     * @param CreateMessageRequest $request
     * @return Response
     */
	public function store(CreateMessageRequest $request)
	{
        try {
            //Save the lead to the database
            $this->_message->sender_name = $request->input('sender_name');
            $this->_message->sender_email = $request->input('sender_email');
            $this->_message->sender_phone = str_replace('-', '', $request->input('sender_phone'));
            $this->_message->message = $request->input('message');
            $this->_message->save();

            //Construct the email message
            $details['name'] = $this->_message->sender_name;
            $details['email'] = $this->_message->sender_email;
            $details['phone'] = $this->_message->sender_phone;
            $details['content'] = $this->_message->message;

            //Send confirmation to customer
            Mail::send('emails.message-confirm', $details, function($message)
            {
                $message->to($this->_message->sender_email);
            });

            //Send customer info to administrator
            Mail::send('emails.new-message', $details, function($message)
            {
                $message->to(Config::get('messages.site_admin'));
            });

        } catch(Exception $e)
        {
            if($request->ajax())
            {
                return response()->json(['status' => 'error']);
            }
            return redirect('/');
        }

        //Return a JSON response if the form was submitted via AJAX.
        if($request->ajax())
        {
            return response()->json(['status' => 'success'])
                ->withCookie(cookie()->forever('contacted', true));
        }

        //Return a redirect if the form was not submitted via AJAX.
        return redirect('/about')
            ->withCookie(cookie()->forever('contacted', true));
	}

    /**
     * Update a message model.
     *
     * @param $message_id
     * @return Response
     * @internal param Request $request
     * @internal param int $id
     */
	public function update($message_id)
	{
		try {
            $message = $this->_message->findOrFail($message_id);
            $message->read = $this->_request->input('read');
            $message->save();

            return response()->json(['status' => 'success']);

        } catch(Exception $e)
        {
            return response()->json(['status' => 'error']);
        }
	}

    /**
     * Delete a message model.
     *
     * @param $message_id
     * @return Response
     * @internal param int $id
     */
	public function destroy($message_id)
	{
        try {
            $message = $this->_message->findOrFail($message_id);
            $message->delete();

            return redirect('/admin/messages');

        } catch(Exception $e)
        {
            return redirect('/admin/messages');
        }
	}
}
