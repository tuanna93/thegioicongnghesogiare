<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    protected $fillable = ['name','slug','price_new','price_old','intro','content','image','cate_id','keywords','description','status_sale','status'];

    public function GetPercent(){
        $price_new = $this->attributes['price_new'];
        $price_old = $this->attributes['price_old'];
        if($price_old != 0  && $price_new < $price_old){
            return 100 - number_format(($price_new/$price_old)*100,0,",",".")."%";
        }
    }

}
