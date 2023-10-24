<?php

namespace App\Models;

use App\Models\Category;
use App\Models\ProductColor;
use App\Models\ProdutImages;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;
    protected $table = 'product';

    protected $fillable = [
        'category_id',
        'name',
        'slug',

        'brand',
        'small_description',
        'description',

        'original_price',
        'selling_price',
        'quantity',
        'trending',
        'status',

        'meta_title',
        'meta_keyword',
        'meta_description',
    ];

    public function productImage(){
        return $this->hasMany(ProdutImages::class, 'product_id', 'id');
    }

    public function category(){
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function productColor(){
        return $this->hasMany(ProductColor::class, 'product_id', 'id');
    }
}
