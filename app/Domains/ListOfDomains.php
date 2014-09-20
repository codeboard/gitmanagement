<?php  namespace Codeboard\Domains; 
use Codeboard\Domains\Repositories\DomainRepository;
use Illuminate\Contracts\Auth\Authenticator;
use Illuminate\Log\Writer;

class ListOfDomains {

    /**
     * @var Repositories\DomainRepository
     */
    private $repository;
    /**
     * @var \Illuminate\Log\Writer
     */
    private $log;
    /**
     * @var \Illuminate\Contracts\Auth\Authenticator
     */
    private $auth;

    /**
     * @param DomainRepository $repository
     * @param Authenticator $auth
     * @param Writer $log
     */
    function __construct(DomainRepository $repository, Authenticator $auth, Writer $log)
    {
        $this->repository = $repository;
        $this->log = $log;
        $this->auth = $auth;
    }

    /**
     * @param DomainListener $listener
     * @return mixed
     */
    public function execute(DomainListener $listener)
    {
        $user = $this->auth->user();
        $domains = $this->repository->listOfDomains($user->id);
        $this->log->info('Show Domains');
        return $listener->view('domains.index', compact('domains'));
    }
}