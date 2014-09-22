<?php  namespace Codeboard\Workers; 

use Codeboard\Workers\Repositories\WorkersRepositoryInterface;
use Illuminate\Log\Writer;

class AddNewWorker {

    /**
     * @var Repositories\WorkersRepositoryInterface
     */
    private $repository;
    /**
     * @var \Illuminate\Log\Writer
     */
    private $log;

    /**
     * @param WorkersRepositoryInterface $repository
     * @param Writer $log
     */
    function __construct(WorkersRepositoryInterface $repository, Writer $log)
    {
        $this->repository = $repository;
        $this->log = $log;
    }

    /**
     * @param $domainId
     * @param $workerData
     * @param WorkerListener $listener
     * @return mixed
     */
    public function execute($domainId, $workerData, WorkerListener $listener)
    {
        if( empty($workerData['environment']))
            $workerData['environment'] = 'production';
        $worker = $this->repository->addNewWorker($domainId, $workerData);
        $this->log->info('Worker Created', $worker->toArray());
        return $listener->redirectWorker($worker);
    }
} 