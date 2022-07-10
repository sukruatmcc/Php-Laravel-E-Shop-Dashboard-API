<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cupon extends Model
{
    use HasFactory;
    protected $table='cupons';
    protected $fillable=['cupon_name','discount','cupon_slug','status','created_at','updated_at'];
}
