<?php  namespace Codeboard\Domains;

use Raymondidema\Presenter\Presenter;

class DomainPresenter extends Presenter {

    /**
     * Show a nice way to have the wildcard active or inactive
     * @return string
     */
    public function allowWildcards()
    {
        if((bool) $this->entity->allowWildcard)
            return '<span class="glyphicon glyphicon-ok-circle"></span> Active';
        else
            return '<span class="glyphicon glyphicon-remove-circle"></span> Inactive';
    }
} 