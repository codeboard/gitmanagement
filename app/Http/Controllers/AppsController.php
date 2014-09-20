<?php namespace Codeboard\Http\Controllers;

use Codeboard\Apps\AddNewApp;
use Codeboard\Apps\AppListener;
use Codeboard\Apps\UninstallApp;
use Codeboard\Apps\UpdateBranch;
use Codeboard\Http\Requests\AddAppRequest;
use Codeboard\Http\Requests\UpdateBranchRequest;
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
     * @param  int $id
     * @param \Codeboard\Http\Requests\UpdateBranchRequest $request
     * @param \Codeboard\Apps\UpdateBranch $branch
     * @return Response
     */
	public function update($id, UpdateBranchRequest $request, UpdateBranch $branch)
	{
		return $branch->execute($id, $request->all(), $this);
	}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @param \Codeboard\Apps\UninstallApp $app
     * @return Response
     */
	public function destroy($id, UninstallApp $app)
	{
		return $app->execute($id, $this);
	}

    public function appRedirect($data = null)
    {
        return redirect()->route('admin.domains.index')->withDomain($data);
    }
}
