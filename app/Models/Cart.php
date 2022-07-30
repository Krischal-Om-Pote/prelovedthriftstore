<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\belongsTo;

class Cart extends Model
{
    protected $table = 'carts';
    protected $fillable = [
        'user_id',
        'image',
        'price',
        'product_id',
        'quantity'
    ];
    public function products()
    {
        // return $this>belongsTo(Product::class,'product_id','id');
    }
}
