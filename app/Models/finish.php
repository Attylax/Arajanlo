<?php
/**
 * Created by PhpStorm.
 * User: k_att
 * Date: 17/12/01
 * Time: 13:54
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Finish extends Model
{
    public $fillable = ['name'];
    protected $table = 'finish';
    public $timestamps = false;

    public static function create(array $attributes = [])
    {
        $model = static::query()->create($attributes);

        // ...

        return $model;
    }
}