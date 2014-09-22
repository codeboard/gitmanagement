<?php  namespace Codeboard\Workers; 

use Codeboard\Domains\Domain;
use Codeboard\Workers\Repositories\WorkersRepositoryInterface;
use Illuminate\Log\Writer;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\File;

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
     * Executes the command
     *
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
        $this->storeSupervisordConfig($worker);
        return $listener->redirectWorker($worker);
    }

    /**
     * Stores The SupervisorD configuration
     *
     * @param $worker
     */
    private function storeSupervisordConfig($worker)
    {
        $domain = Domain::findOrFail($worker->domain_id);
        $file = view('configuration.supervisord', compact('worker', 'domain'))->render();
        File::put(Config::get('settings.supervisord_location').'/worker-'.$worker->id.'.log', $file);
        $this->log->info('Supervisord Config created');
    }
} 