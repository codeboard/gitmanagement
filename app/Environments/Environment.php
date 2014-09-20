<?php namespace Codeboard\Environments;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Environment extends Model {

    protected $fillable = ['key', 'value', 'environment'];

    public function setKeyAttribute($value)
    {
        $this->attributes['key'] = strtoupper(Str::slug($value, '_'));
    }
} 