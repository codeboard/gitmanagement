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
        $this->newToken($domain->id);
        return $domain;
    }

    /**
     * @param $domainId
     * @return \Illuminate\Support\Collection|static
     */
    public function deleteDomain($domainId)
    {
        $domain = $this->getDomainById($domainId);
        $domain->delete();
        return $domain;
    }

    /**
     * @param $userId
     * @return mixed
     */
    public function listOfDomains($userId)
    {
        $user = User::with('domains.workers')->findOrFail($userId);
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

    /**
     * @param $domainId
     * @return mixed
     */
    public function newToken($domainId)
    {
        $domain = $this->getDomainById($domainId);
        $domain->token = str_random(72);
        $domain->save();
        return $domain;
    }
}