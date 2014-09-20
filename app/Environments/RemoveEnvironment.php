<?php  namespace Codeboard\Environments; 
use Codeboard\Environments\Repositories\EnvironmentRepository;
use Illuminate\Log\Writer;

class RemoveEnvironment {

    /**
     * @var Repositories\EnvironmentRepository
     */
    private $repository;
    /**
     * @var \Illuminate\Log\Writer
     */
    private $log;

    /**
     * @param EnvironmentRepository $repository
     * @param Writer $log
     */
    function __construct(EnvironmentRepository $repository, Writer $log)
    {
        $this->repository = $repository;
        $this->log = $log;
    }

    /**
     * @param $environmentId
     * @param EnvironmentsListener $listener
     * @return mixed
     */
    public function execute($environmentId, EnvironmentsListener $listener)
    {
        $environment = $this->repository->removeEnvironment($environmentId);
        $this->log->info('Environment variable removed', $environment->toArray());
        return $listener->environmentRedirect($environment);
    }

} 