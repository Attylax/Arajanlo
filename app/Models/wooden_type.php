<?php
/**
 * Created by PhpStorm.
 * User: k_att
 * Date: 17/12/01
 * Time: 13:54
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Wooden_type extends Model
{
    public $fillable = ['name', 'unit'];
    protected $table = 'wooden_type';
    public $timestamps = false;

    public static function create(array $attributes = [])
    {
        $model = static::query()->create($attributes);

        // ...

        return $model;
    }

}