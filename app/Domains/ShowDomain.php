<?php  namespace Codeboard\Domains; 

use Codeboard\Domains\Repositories\DomainRepository;
use Illuminate\Contracts\Config\Config;
use Illuminate\Filesystem\Filesystem;
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
     * @var Filesystem
     */
    private $filesystem;
    /**
     * @var Config
     */
    private $config;

    /**
     * @param DomainRepository $repository
     * @param Writer $log
     * @param \Illuminate\Filesystem\Filesystem $filesystem
     * @param \Illuminate\Contracts\Config\Config $config
     */
    function __construct(DomainRepository $repository, Writer $log, Filesystem $filesystem, Config
    $config)
    {
        $this->repository = $repository;
        $this->log = $log;
        $this->filesystem = $filesystem;
        $this->config = $config;
    }

    /**
     * @param $domainId
     * @param DomainListener $listener
     * @return mixed
     */
    public function execute($domainId, DomainListener $listener)
    {

        $domain = $this->repository->getDomainById($domainId);
        $sshKey = $this->getPublicKey();
        $this->log->info('Show Domain id ' . $domainId, $domain->toArray());
        return $listener->view('domains.show', compact('domain', 'sshKey'));
    }

    private function getPublicKey()
    {
        if($this->filesystem->exists($this->config->get('settings.ssh_key_location')))
            return $this->filesystem->get($this->config->get('settings.ssh_key_location'));
    }

} 