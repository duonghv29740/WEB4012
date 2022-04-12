<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory; //trait

    protected $table = 'categories';

    protected $fillable = [
        'name',
        'description',
        'status',
        'parent_id',
        'slug'
    ];
    // public function products(){
    //     return $this->hasMany(Product::class,'category_id','id');
    // }
    public function products()
    {
        return $this->belongsToMany(
            Category::class,
            'category_product',
            'category_id',
            'product_id',

        );
    }
    public function categories()
    {
        return $this->hasMany(
            Category::class,
            'parent_id',
            'id'
        );
    }
}
