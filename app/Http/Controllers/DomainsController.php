<?php namespace Codeboard\Http\Controllers;

use Codeboard\Domains\DestroyDomain;
use Codeboard\Domains\Domain;
use Codeboard\Domains\DomainListener;
use Codeboard\Domains\DomainTrait;
use Codeboard\Domains\GenerateDomainToken;
use Codeboard\Domains\ListOfDomains;
use Codeboard\Domains\Redirect;
use Codeboard\Domains\RegisterDomain;
use Codeboard\Domains\ShowDomain;
use Codeboard\Http\Requests\CreateDomainRequest;
use Codeboard\Http\Requests\updateNginxConfigRequest;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\File;

class DomainsController extends Controller implements DomainListener {

    use DomainTrait;

    /**
     * Display a listing of the resource.
     *
     * @param \Codeboard\Domains\ListOfDomains $domains
     * @return Response
     */
	public function index(ListOfDomains $domains)
	{
		return $domains->execute($this);
	}

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
	public function create()
	{
        return view('domains.create');
	}

    /**
     * Store a newly created resource in storage.
     *
     * @param \Codeboard\Http\Requests\CreateDomainRequest $request
     * @param \Codeboard\Domains\RegisterDomain $domain
     * @return Response
     */
	public function store(CreateDomainRequest $request, RegisterDomain $domain)
	{
        return $domain->execute($request->all(), $this);
	}

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @param \Codeboard\Domains\ShowDomain $domain
     * @return Response
     */
	public function show($id, ShowDomain $domain)
	{
        return $domain->execute($id, $this);
	}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @param \Codeboard\Domains\DestroyDomain $domain
     * @return Response
     */
	public function destroy($id, DestroyDomain $domain)
	{
		return $domain->execute($id, $this);
	}

    /**
     * @param $domainId
     * @param GenerateDomainToken $token
     * @return Redirect
     */
    public function generateToken($domainId, GenerateDomainToken $token)
    {
        return $token->execute($domainId, $this);
    }

    /**
     * @param $domainId
     * @return mixed
     */
    public function showNginx($domainId)
    {
        $domain = Domain::findOrFail($domainId);
        if(File::exists(Config::get('settings.nginx_location').'/'.$domain->name))
            return File::get(Config::get('settings.nginx_location').'/'.$domain->name);

    }

    public function updateNginx($domainId, updateNginxConfigRequest $request)
    {
        $domain = Domain::findOrFail($domainId);
        if(File::exists(Config::get('settings.nginx_location').'/'.$domain->name))
            File::put(Config::get('settings.nginx_location').'/'.$domain->name, $request->get('nginx'));
    }
}
