<?php namespace Codeboard\Http\Controllers;

use Codeboard\Apps\AddNewApp;
use Codeboard\Apps\AppListener;
use Codeboard\Http\Requests\AddAppRequest;
use Illuminate\Routing\Controller;

class AppsController extends Controller implements AppListener {

    /**
     * Store a newly created resource in storage.
     *
     * @param $domainId
     * @param \Codeboard\Http\Requests\AddAppRequest $request
     * @param \Codeboard\Apps\AddNewApp $app
     * @return Response
     */
	public function store($domainId, AddAppRequest $request, AddNewApp $app)
	{
		return $app->execute($domainId, $request->all(), $this);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

    public function appRedirect($data = null)
    {
        return redirect()->route('admin.domains.index')->withDomain($data);
    }
}
