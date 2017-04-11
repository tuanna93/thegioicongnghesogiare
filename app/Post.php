<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    protected $fillable = ['name','slug','image','intro','content','post_id','keywords','description','status'];

    public function getDate(){
        return Carbon::parse($this->attributes['created_at'])->format('d/m/Y');
    }
}
