<?php namespace Codeboard\Domains;

use Illuminate\Database\Eloquent\Model;
use Raymondidema\Presenter\PresentableTrait;

class Domain extends Model {

    use PresentableTrait;

    protected $presenter = DomainPresenter::class;

    protected $fillable = ['name', 'shortName', 'directory', 'allowWildcard'];

}