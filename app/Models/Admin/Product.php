<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'name',
        'slug',
        'brand_id',
        'model',
        'short_desc',
        'desc',
        'lead_time',
        'tax_id',
        'is_promo',
        'is_featured',
        'is_discounted',
        'is_tranding',
        'keywords',
        'technical_specification',
        'uses',
        'warranty',
        'image',
        'status',
    ];
}
