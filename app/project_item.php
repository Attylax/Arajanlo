<?php
/**
 * Created by PhpStorm.
 * User: k_att
 * Date: 17/12/01
 * Time: 13:54
 */

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project_item extends Model{
    public $fillable = ['name', 'costumer', 'Status'];
}