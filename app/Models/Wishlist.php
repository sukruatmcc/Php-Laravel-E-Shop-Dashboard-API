<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    use HasFactory;
    protected $table='wishlists';
    protected $fillable=['user_id','product_id'];

    public function user()
    {
      return $this->belongsTo('App\Models\User','user_id','id');
    }

    public function getProducts()
    {
      return $this->belongsTo('App\Models\Products','product_id','id');
    }
}
