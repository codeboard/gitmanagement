<?php  namespace Codeboard\Workers; 
use Codeboard\Workers\Repositories\WorkersRepositoryInterface;
use Illuminate\Log\Writer;

class KillWorker {

    /**
     * @var Repositories\WorkersRepositoryInterface
     */
    private $repository;
    /**
     * @var Writer
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
     * @param $workerId
     * @param WorkerListener $listener
     * @return mixed
     */
    public function execute($workerId, WorkerListener $listener)
    {
        $worker = $this->repository->killWorker($workerId);
        $this->log->info('Worker Killed', $worker->toArray());
        return $listener->redirectWorker($worker);
    }

} 