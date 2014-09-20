<?php  namespace Codeboard\Apps;

use Raymondidema\Presenter\Presenter;

class RepositoryPresenter extends Presenter {

    public function name()
    {
        $name = explode(':',$this->entity->url);
        return str_replace('.git', '',$name[1]);
    }
} 