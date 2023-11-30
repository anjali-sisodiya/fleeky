<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeBanner extends Model
{
    use HasFactory;

    protected $fillable = [
        'image',
        'btn_txt',
        'btn_link',
        'desc',
        'short_desc',
        'status',
    ];
}

