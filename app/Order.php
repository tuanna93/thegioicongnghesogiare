<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

    protected $fillable = ['name','email','address','city','comment','phone','id_pro','id_order_product','id_user'];

}
