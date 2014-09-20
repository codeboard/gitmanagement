<?php  namespace Codeboard\Apps\Repositories; 

use Codeboard\Domains\Domain;

class AppRepository {

    public function addNewRepository($domainId, $repositoryData)
    {
        $domain = Domain::findOrFail($domainId);
        $repository = $domain->app()->create($repositoryData);
        return $repository;
    }

} 