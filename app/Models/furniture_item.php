<?php
/**
 * Created by PhpStorm.
 * User: k_att
 * Date: 17/12/01
 * Time: 13:54
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\wooden;

class Furniture_item extends Model
{
    public $fillable = ['name', 'quantity', 'sizeX', 'sizeY', 'sizeZ', 'price', 'WoodenID', 'FurnitureID', 'FinishID'];
    protected $table = 'elements';
    public $timestamps = false;

    public function wooden_name()
    {
        return $this->hasOne(wooden)->get(['name']);
    }
//
//    public function wooden_type_name()
//    {
//
//    }

    public static function create(array $attributes = [wooden_name])
    {
        $model = static::query()->create($attributes);

        // ...

        return $model;
    }
}