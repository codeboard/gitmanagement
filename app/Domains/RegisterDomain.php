<?php  namespace Codeboard\Domains; 
use Codeboard\Domains\Repositories\DomainRepository;
use Illuminate\Contracts\Auth\Authenticator;
use Illuminate\Log\Writer;

class RegisterDomain {

    /**
     * @var Repositories\DomainRepository
     */
    private $repository;
    /**
     * @var \Illuminate\Contracts\Auth\Authenticator
     */
    private $auth;
    /**
     * @var \Illuminate\Log\Writer
     */
    private $log;

    /**
     * @param DomainRepository $repository
     * @param Authenticator $auth
     * @param \Illuminate\Log\Writer $log
     */
    function __construct(DomainRepository $repository, Authenticator $auth, Writer $log)
    {
        $this->repository = $repository;
        $this->auth = $auth;
        $this->log = $log;
    }

    /**
     * @param $domainData
     * @param DomainListener $listener
     * @return Redirect
     */
    public function execute($domainData, DomainListener $listener)
    {
        $this->log->info('Domain Created');
        $user = $this->auth->user();
        $domainData['shortName'] = $domainData['name'];
        $domain = $this->repository->createDomain($user->id, $domainData);
        return $listener->domainRedirect($domain);
    }

} 