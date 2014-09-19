<?php namespace Codeboard\Http\Controllers;

use Codeboard\Http\Requests\Auth\LoginRequest;
use Illuminate\Contracts\Auth\Authenticator;
use Illuminate\Routing\Controller;

class SessionsController extends Controller {

    public function __construct()
    {
        $this->beforeFilter('guest', ['except' => ['destroy']]);
    }

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('sessions.create');
	}

    /**
     * Store a newly created resource in storage.
     *
     * @param \Codeboard\Http\Requests\Auth\LoginRequest $request
     * @param \Illuminate\Contracts\Auth\Authenticator $auth
     * @return Response
     */
	public function store(LoginRequest $request, Authenticator $auth)
	{
		if($auth->attempt($request->only('email', 'password'), true))
            return redirect()->intended('/');
        else
            return redirect()->back()->withInput()->withErrors(['Credentials are incorrect']);
	}

    /**
     * Remove the specified resource from storage.
     *
     * @param \Illuminate\Contracts\Auth\Authenticator $auth
     * @internal param int $id
     * @return Response
     */
	public function destroy(Authenticator $auth)
	{
		$auth->logout();
        return redirect()->home();
	}

}
