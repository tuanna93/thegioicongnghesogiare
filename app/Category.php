<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';

    protected $fillable = ['name','slug','sort_order','icon','parent_id','keywords','description'];

    public function getProduct(){
        return $this->hasMany('App\Product');
    }
}
