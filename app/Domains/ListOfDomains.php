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

    function __construct(DomainRepository $repository, Authenticator $auth, Writer $log)
    {
        $this->repository = $repository;
        $this->log = $log;
        $this->auth = $auth;
    }

    public function execute(DomainListener $listener)
    {
        $this->log->info('Show Domains');
        $user = $this->auth->user();
        $domains = $this->repository->listOfDomains($user->id);
        return $listener->view('domains.index', compact('domains'));
    }
}