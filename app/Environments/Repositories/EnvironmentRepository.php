<?php  namespace Codeboard\Environments\Repositories; 
use Codeboard\Domains\Domain;

class EnvironmentRepository {

    public function addEnvironment($domainId, $envData)
    {
        $domain = Domain::findOrFail($domainId);
        $environment = $domain->environments()->create($envData);
        return $environment;
    }

} 