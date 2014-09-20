<?php  namespace Codeboard\Apps; 
use Codeboard\Apps\Repositories\AppRepository;
use Illuminate\Log\Writer;

class UpdateBranch {

    /**
     * @var Repositories\AppRepository
     */
    private $repository;
    /**
     * @var \Illuminate\Log\Writer
     */
    private $log;

    function __construct(AppRepository $repository, Writer $log)
    {
        $this->repository = $repository;
        $this->log = $log;
    }

    public function execute($appId, $appData, AppListener $listener)
    {
        $app = $this->repository->updateRepository($appId, $appData);
        $this->log->info('Branch Updated', $app->toArray());
        return $listener->appRedirect($app);
    }
} 