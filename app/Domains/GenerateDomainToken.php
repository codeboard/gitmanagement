<?php  namespace Codeboard\Domains; 

use Codeboard\Domains\Repositories\DomainRepository;
use Illuminate\Log\Writer;

class GenerateDomainToken {

    /**
     * @var Repositories\DomainRepository
     */
    private $repository;
    /**
     * @var \Illuminate\Log\Writer
     */
    private $log;

    /**
     * @param DomainRepository $repository
     * @param Writer $log
     */
    function __construct(DomainRepository $repository, Writer $log)
    {
        $this->repository = $repository;
        $this->log = $log;
    }

    /**
     * @param $domainId
     * @param DomainListener $listener
     * @return Redirect
     */
    public function execute($domainId, DomainListener $listener)
    {
        $domain = $this->repository->newToken($domainId);
        $this->log->info('New Token Generated', $domain->toArray());
        return $listener->domainRedirect($domain);
    }
} 