<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class box_item extends Model
{
    public $fillable = ['name'];
    protected $table = 'boxes';
    public $timestamps = false;

    public static function create(array $attributes = [])
    {
        $model = static::query()->create($attributes);

        return $model;
    }
}
