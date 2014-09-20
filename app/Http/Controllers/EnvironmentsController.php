<?php namespace Codeboard\Http\Controllers;

use Codeboard\Environments\AddEnvironment;
use Codeboard\Environments\EnvironmentsListener;
use Codeboard\Environments\RemoveEnvironment;
use Codeboard\Http\Requests\AddEnvironmentRequest;
use Illuminate\Routing\Controller;

class EnvironmentsController extends Controller implements EnvironmentsListener
{

    /**
     * Store a newly created resource in storage.
     *
     * @param $domainId
     * @param \Codeboard\Http\Requests\AddEnvironmentRequest $request
     * @param \Codeboard\Environments\AddEnvironment $environment
     * @return Response
     */
	public function store($domainId, AddEnvironmentRequest $request, AddEnvironment $environment)
	{
		return $environment->execute($domainId, $request->all(), $this);
	}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @param \Codeboard\Environments\RemoveEnvironment $environment
     * @return Response
     */
	public function destroy($id, RemoveEnvironment $environment)
	{
		return $environment->execute($id, $this);
	}

    /**
     * @param null $data
     * @return \Illuminate\Http\RedirectResponse
     */
    public function environmentRedirect($data = null)
    {
        return redirect()->route('admin.domains.show', $data->domain_id);
    }

}
