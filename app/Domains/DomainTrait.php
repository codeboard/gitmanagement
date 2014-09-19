<?php namespace Codeboard\Domains;

trait DomainTrait {

    /**
     * Redirect to domain index
     * @param null|mixed $data
     * @return Redirect
     */
    public function domainRedirect($data = null)
    {
        $domain = ( ! $data) ? [] : $data;
        return redirect()->route('admin.domains.index')->withDomain($domain);
    }

    /**
     * Generates the view
     * @param $name
     * @param $data
     * @return mixed
     */
    public function view($name, $data)
    {
        return view($name, $data);
    }

} 