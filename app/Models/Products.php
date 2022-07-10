<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;
    protected $table='products';
    protected $fillable=['category_id','brand_id','name','slug','code','quantity','short_description','long_description','price','image','status','created_at','updated_at'];

    public function getCategory()
    {
      return $this->hasMany('App\Models\Category','id','category_id');
    }

    public function category()
    {
      return $this->belongsTo('App\Models\Category','category_id','id');
    }

    public function brand()
    {
      return $this->belongsTo('App\Models\Brand','brand_id','id');
    }

    public function rating()
    {
        return $this->belongsTo('App\Models\Review','product_id');
    }
}
