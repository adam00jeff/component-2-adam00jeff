<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable =[
        'title' , 'artist', 'price'
    ];
    public function productType()
    {
        return $this->hasOne('App\Models\ProductType','id','product_type_id');
    }
}

