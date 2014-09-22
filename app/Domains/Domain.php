<?php namespace Codeboard\Domains;

use Illuminate\Database\Eloquent\Model;
use Raymondidema\Presenter\PresentableTrait;

class Domain extends Model {

    use PresentableTrait;

    /**
     * @var \Codeboard\Domains\DomainPresenter
     */
    protected $presenter = DomainPresenter::class;

    /**
     * @var array
     */
    protected $fillable = ['name', 'shortName', 'directory', 'allowWildcard'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function app()
    {
        return $this->hasOne('Codeboard\Apps\Repository');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function environments()
    {
        return $this->hasMany('Codeboard\Environments\Environment');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function workers()
    {
        return $this->hasMany('Codeboard\Workers\Worker');
    }

}