<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'short_description',
        'price',
        'thumbnail_url',
        'quantity',
        'status',
        'category_id'
    ];
}
