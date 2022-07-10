<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $fillable=['product_id','qty','price','user_ip','created_at','updated_at'];

    public function getProducts()
    {
      return $this->belongsTo('App\Models\Products','product_id','id');
    }
}
