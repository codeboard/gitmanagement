<?php namespace Codeboard\Domains\Repositories;

use Codeboard\Domains\Domain;
use Codeboard\User;

class DomainRepository implements DomainRepositoryInterface
{

    /**
     * @param $userId
     * @param $domainData
     * @return mixed
     */
    public function createDomain($userId, $domainData)
    {
        $user = User::findOrFail($userId);
        $domain = $user->domains()->create($domainData);
        return $domain;
    }

    /**
     * @param $domainId
     * @return \Illuminate\Support\Collection|static
     */
    public function deleteDomain($domainId)
    {
        $domain = Domain::findOrFail($domainId);
        $domain->delete();
        return $domain;
    }

    /**
     * @param $userId
     * @return mixed
     */
    public function listOfDomains($userId)
    {
        $user = User::findOrFail($userId);
        return $user->domains;
    }

    /**
     * @param $domainId
     * @return \Illuminate\Support\Collection|static
     */
    public function getDomainById($domainId)
    {
        return Domain::findOrFail($domainId);
    }

} 