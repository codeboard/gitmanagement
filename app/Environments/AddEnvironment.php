<?php  namespace Codeboard\Environments; 
use Codeboard\Environments\Repositories\EnvironmentRepository;
use Illuminate\Log\Writer;

class AddEnvironment {


    /**
     * @var Repositories\EnvironmentRepository
     */
    private $repository;
    /**
     * @var \Illuminate\Log\Writer
     */
    private $log;

    function __construct(EnvironmentRepository $repository, Writer $log)
    {
        $this->repository = $repository;
        $this->log = $log;
    }

    public function execute($domainId, $envData, EnvironmentsListener $listener)
    {
        if( empty($envData['environment']))
            $envData['environment'] = 'production';
        $environment = $this->repository->addEnvironment($domainId, $envData);
        $this->log->info('Environment variable added', $environment->toArray());
        return $listener->environmentRedirect($environment);
    }
} 