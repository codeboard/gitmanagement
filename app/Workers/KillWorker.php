<?php  namespace Codeboard\Workers; 
use Codeboard\Workers\Repositories\WorkersRepositoryInterface;
use Illuminate\Log\Writer;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\File;

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
     * Executes command
     *
     * @param $workerId
     * @param WorkerListener $listener
     * @return mixed
     */
    public function execute($workerId, WorkerListener $listener)
    {
        $worker = $this->repository->killWorker($workerId);
        $this->log->info('Worker Killed', $worker->toArray());
        $this->destroyConfiguration($worker);
        return $listener->redirectWorker($worker);
    }

    /**
     * Removes the file from storage
     *
     * @param $worker
     */
    private function destroyConfiguration($worker)
    {
        $this->log->info('Worker File removed');
        File::delete(Config::get('settings.supervisord_location').'/worker-'.$worker->id.'.log');
    }

} 