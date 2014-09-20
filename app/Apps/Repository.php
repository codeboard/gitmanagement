<?php namespace Codeboard\Apps;

use Illuminate\Database\Eloquent\Model;
use Raymondidema\Presenter\PresentableTrait;

class Repository extends Model {

    use PresentableTrait;

    protected $presenter = RepositoryPresenter::class;

    protected $fillable = ['url', 'branch', 'run_composer', 'run_migrations'];

}