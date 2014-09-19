<?php  namespace Codeboard\Domains;

use Codeboard\Domains\Repositories\DomainRepository;
use Illuminate\Log\Writer;

class DestroyDomain {

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
        $domain = $this->repository->deleteDomain($domainId);
        $this->log->info('Domain Id: '. $domainId . ' is deleted successfully');
        return $listener->domainRedirect($domain);
    }
}