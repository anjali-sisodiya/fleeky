<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products_attr extends Model
{
    use HasFactory;
    protected $table = 'products_attr';
    protected $fillable = [
        'product_id',
        'size_id',
        'color_id',
        'sku',
        'qty',
        'mrp',
        'price',
        'image',
    ];
}
