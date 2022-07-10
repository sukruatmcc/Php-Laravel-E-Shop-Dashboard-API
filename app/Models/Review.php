<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;
    protected $table = 'reviews';
    protected $fillable = ['user_id','product_id','rating','review','status','created_at','updated_at'];

    public function user()
    {
        return $this->belongsTo('App\Models\User','user_id');
    }

    public function product()
    {
        return $this->belongsTo('App\Models\Products','product_id');
    }
}
