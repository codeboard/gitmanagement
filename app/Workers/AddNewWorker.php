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

    function __construct(WorkersRepositoryInterface $repository, Writer $log)
    {
        $this->repository = $repository;
        $this->log = $log;
    }

    public function execute($domainId, $workerData, WorkerListener $listener)
    {
        if( empty($workerData['environment']))
            $workerData['environment'] = 'production';
        $worker = $this->repository->addNewWorker($domainId, $workerData);
        $this->log->info('Worker Created', $worker->toArray());
        return $listener->redirectWorker($worker);
    }
} 