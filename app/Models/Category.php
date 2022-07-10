<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table='categories';
    protected $fillable=['name','slug','status','created_at'];

    public function search()
    {
       return $this->hasMany('App\Models\Products','category_id','id');
    }
}
