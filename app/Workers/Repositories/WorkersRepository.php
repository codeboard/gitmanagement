<?php namespace Codeboard\Workers\Repositories;

use Codeboard\Domains\Domain;
use Codeboard\Workers\Worker;

class WorkersRepository implements WorkersRepositoryInterface
{

    /**
     * @param $domainId
     * @param $workerData
     * @return mixed
     */
    public function addNewWorker($domainId, $workerData)
    {
        $domain = Domain::findOrFail($domainId);
        $worker = $domain->workers()->create($workerData);
        return $worker;
    }

    /**
     * @param $workerId
     * @param $workerData
     * @return \Illuminate\Support\Collection|static
     */
    public function customizeWorker($workerId, $workerData)
    {
        $worker = Worker::findOrFail($workerId);
        $worker->update($workerData);
        return $worker;
    }

    /**
     * @param $workerId
     * @return mixed
     */
    public function killWorker($workerId)
    {
        $worker = Worker::findOrFail($workerId);
        $worker->delete();
        return $worker;
    }
}