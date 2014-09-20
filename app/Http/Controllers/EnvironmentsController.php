<?php namespace Codeboard\Http\Controllers;

use Codeboard\Environments\AddEnvironment;
use Codeboard\Environments\EnvironmentsListener;
use Codeboard\Http\Requests\AddEnvironementRequest;
use Illuminate\Routing\Controller;

class EnvironmentsController extends Controller implements EnvironmentsListener
{

    /**
     * Store a newly created resource in storage.
     *
     * @param $domainId
     * @param \Codeboard\Http\Requests\AddEnvironementRequest $request
     * @param \Codeboard\Environments\AddEnvironment $environment
     * @return Response
     */
	public function store($domainId, AddEnvironementRequest $request, AddEnvironment $environment)
	{
		return $environment->execute($domainId, $request->all(), $this);
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

    public function environmentRedirect($data = null)
    {
        return redirect()->route('admin.domains.show', $data->domain_id);
    }

}
