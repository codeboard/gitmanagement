<?php namespace Codeboard\Workers\Repositories;

interface WorkersRepositoryInterface
{
    /**
     * @param $domainId
     * @param $workerData
     * @return mixed
     */
    public function addNewWorker($domainId, $workerData);

    /**
     * @param $workerId
     * @param $workerData
     * @return \Illuminate\Support\Collection|static
     */
    public function customizeWorker($workerId, $workerData);

    /**
     * @param $workerId
     * @return mixed
     */
    public function killWorker($workerId);
}