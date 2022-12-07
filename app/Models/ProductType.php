<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductType extends Model
{
    use HasFactory;

    public function product()
    {
        return $this->hasMany('App\Models\Product', 'product_type_id', 'id');
    }
}

