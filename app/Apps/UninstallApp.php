<?php namespace Codeboard\Apps;

use Codeboard\Apps\Repositories\AppRepository;
use Illuminate\Log\Writer;

class UninstallApp {


    /**
     * @var Repositories\AppRepository
     */
    private $repository;
    /**
     * @var \Illuminate\Log\Writer
     */
    private $log;

    function __construct(AppRepository $repository, Writer $log)
    {
        $this->repository = $repository;
        $this->log = $log;
    }

    public function execute($appId, AppListener $listener)
    {
        $repository = $this->repository->unInstallRepository($appId);
        $this->log->info('App UnInstalled', $repository->toArray());
        return $listener->appRedirect($repository);
    }
} 