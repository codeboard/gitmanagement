<?php namespace Codeboard\Domains;

use Codeboard\Domains\Repositories\DomainRepository;
use Illuminate\Contracts\Auth\Authenticator;
use Illuminate\Log\Writer;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\File;

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
        $user = $this->auth->user();
        $domainData['shortName'] = $domainData['name'];
        $domain = $this->repository->createDomain($user->id, $domainData);
        $this->storeNginxConfig($domain);
        $this->log->info('Domain Created', $domain->toArray());
        return $listener->domainRedirect($domain);
    }

    private function storeNginxConfig($domain)
    {
        $file = view('configuration.nginx-plain', compact('domain'))->render();
        File::put(Config::get('settings.nginx_location').'/'.$domain->name, $file);
        $this->log->info('Nginx Config created');
    }

} 