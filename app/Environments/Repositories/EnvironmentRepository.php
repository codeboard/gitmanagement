<?php  namespace Codeboard\Environments\Repositories; 
use Codeboard\Domains\Domain;
use Codeboard\Environments\Environment;

class EnvironmentRepository {

    /**
     * Add a new Environment Variable
     * @param $domainId
     * @param $envData
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function addEnvironment($domainId, $envData)
    {
        $domain = Domain::findOrFail($domainId);
        $environment = $domain->environments()->create($envData);
        return $environment;
    }

    /**
     * Removes the Environment Variable
     *
     * @param $environmentId
     * @return \Illuminate\Support\Collection|static
     */
    public function removeEnvironment($environmentId)
    {
        $environment = Environment::findOrFail($environmentId);
        $environment->delete();
        return $environment;
    }

} 