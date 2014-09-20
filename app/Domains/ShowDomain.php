<?php  namespace Codeboard\Domains; 

use Codeboard\Domains\Repositories\DomainRepository;
use Illuminate\Log\Writer;

class ShowDomain {

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
     * @return mixed
     */
    public function execute($domainId, DomainListener $listener)
    {

        $domain = $this->repository->getDomainById($domainId);
        $this->log->info('Show Domain id ' . $domainId, $domain->toArray());
        return $listener->view('domains.show', compact('domain'));
    }

} 