<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{

    protected $fillable = ['name','slug','icon','sort_order','parent_id','status'];


}
