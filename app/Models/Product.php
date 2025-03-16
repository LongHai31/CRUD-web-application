<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'price', 'description', 'image'
    ];

    // hasMany
    // hasOne
    // belongsTo

    public function productColors(){
        return $this->hasMany(ProductColor::class, 'product_id');
    }
}
