<?php
/**
 * Created by PhpStorm.
 * User: raymondidema
 * Date: 19-09-14
 * Time: 21:25
 */
namespace Codeboard\Domains\Repositories;

interface DomainRepositoryInterface
{
    /**
     * @param $userId
     * @param $domainData
     * @return mixed
     */
    public function createDomain($userId, $domainData);

    /**
     * @param $userId
     * @return mixed
     */
    public function listOfDomains($userId);

    /**
     * @param $domainId
     * @return \Illuminate\Support\Collection|static
     */
    public function deleteDomain($domainId);

    /**
     * @param $domainId
     * @return \Illuminate\Support\Collection|static
     */
    public function getDomainById($domainId);
}