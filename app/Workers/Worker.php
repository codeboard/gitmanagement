<?php namespace Codeboard\Workers;

use Illuminate\Database\Eloquent\Model;

class Worker extends Model {

    protected $fillable = ['connection', 'queue', 'maximum_seconds_per_job', 'rest_when_empty', 'maximum_tries', 'environment'];

}