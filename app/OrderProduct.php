<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{

    protected $fillable = ['id_order','qty','id_product'];

}
