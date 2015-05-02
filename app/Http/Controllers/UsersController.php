<?php namespace fooCart\Http\Controllers;

use Exception;
use fooCart\Http\Requests;
use fooCart\Http\Controllers\Controller;
use fooCart\src\User;

class UsersController extends Controller {

    protected $_user;

    public function __construct(User $user)
    {
        $this->_user = $user;
    }

	/**
	 * Display the user list page.
     * Sends a list of users to user page.
	 *
	 * @return Response
	 */
	public function index()
	{
        try {
            $users = $this->_user->all();
        } catch(Exception $e)
        {
            $users = null;
        }

        return view('admin.users')
            ->withUsers($users);
	}

    /**
     * Delete the user.
     *
     * @param $user_id
     * @return Response
     * @throws \Exception
     * @internal param Request $request
     * @internal param $user_id
     * @internal param int $id
     */
	public function destroy($user_id)
	{
        //Avoid system lockout by preventing the default user from being deleted.
        if($user_id === "1")
        {
            return redirect('admin/users');
        }

        try {
            $this->_user->findOrFail($user_id)->delete();
        } catch(Exception $e)
        {
            return redirect('admin/users');
        }
        return redirect('admin/users');
	}
}
