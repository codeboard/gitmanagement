<?php  namespace Codeboard\Domains;

interface DomainListener {

    /**
     * Redirect to domain index
     * @param null|mixed $data
     * @return Redirect
     */
    public function domainRedirect($data = null);

    /**
     * Generates the view
     * @param $name
     * @param $data
     * @return mixed
     */
    public function view($name, $data);
} 