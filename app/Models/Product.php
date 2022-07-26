<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $fillable = [
        'name',
        'price',
        'quantity',
        'description',
        'image',
        'meta_title',
        'meta_keyword',
        'meta_description',
        'status',
        'category_id',

    ];
}
