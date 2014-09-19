<?php namespace Codeboard\Http\Controllers;

use Codeboard\Http\Requests\Auth\RegisterRequest;
use Codeboard\Repositories\UserRepository;
use Illuminate\Contracts\Auth\Authenticator;
use Illuminate\Routing\Controller;

class RegistrationsController extends Controller {

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('registrations.create');
	}

    /**
     * Store a newly created resource in storage.
     *
     * @param \Codeboard\Http\Requests\Auth\RegisterRequest $request
     * @param \Codeboard\Repositories\UserRepository $repository
     * @param \Illuminate\Contracts\Auth\Authenticator $auth
     * @return Response
     */
	public function store(RegisterRequest $request, UserRepository $repository, Authenticator $auth)
	{
		$user = $repository->createNewUser($request->all());
        $auth->login($user);
        return redirect()->home();
	}

}
