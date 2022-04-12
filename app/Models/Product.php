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
    // public function category(){
    //     return $this->belongsTo(Category::class,'category_id','id');
    // }
    public function categories()
    {
        return $this->belongsToMany(
            Category::class,
            'category_product',
            'product_id',
            'category_id'
        );
    }
    public function news()
    {
        return $this->belongsToMany(
            News::class,
            'product_news',
            'product_id',
            'news_id'
        );
    }
}
