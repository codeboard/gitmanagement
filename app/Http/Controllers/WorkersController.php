<?php namespace Codeboard\Http\Controllers;

use Codeboard\Http\Requests\AddNewWorkerRequest;
use Codeboard\Workers\AddNewWorker;
use Codeboard\Workers\KillWorker;
use Codeboard\Workers\WorkerListener;
use Illuminate\Routing\Controller;

class WorkersController extends Controller implements WorkerListener {

    /**
     * Store a newly created resource in storage.
     *
     * @param $domainId
     * @param \Codeboard\Http\Requests\AddNewWorkerRequest $request
     * @param AddNewWorker $worker
     * @return Response
     */
	public function store($domainId, AddNewWorkerRequest $request, AddNewWorker $worker)
	{
        return $worker->execute($domainId, $request->all(), $this);
	}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @param \Codeboard\Workers\KillWorker $worker
     * @return Response
     */
	public function destroy($id, KillWorker $worker)
	{
        return $worker->execute($id, $this);
	}

    /**
     * @param null $data
     * @return mixed
     */
    public function redirectWorker($data = null)
    {
        return redirect()->route('admin.domains.show', $data->domain_id);
    }
}
