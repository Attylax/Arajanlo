<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Log;
class furniture extends Model{
    public $fillable = ['name', 'BoxID', 'sizeX', 'sizeY', 'sizeZ'];
    protected $table = 'furniture';
    public $timestamps = false;

    public static function create(array $attributes = []){
        $model = static::query()->create($attributes);
        Log::info("Model furniture");
        Log::info($model);
        return $model;
    }

}
