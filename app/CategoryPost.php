<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoryPost extends Model
{

    protected $fillable = ['name','slug','sort_order','icon','parent_id','keywords','description'];

}
