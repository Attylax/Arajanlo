<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WoodenSupplier extends Model
{
    public $fillable = [];
    protected $table = 'supplier_wooden';
    public $timestamps = false;

    public static function create(array $attributes = [])
    {
        $model = static::query()->create($attributes);

        return $model;
    }
}
