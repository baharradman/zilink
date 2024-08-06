<?php

namespace App\Models;

use App\Models\Shop;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;
    protected $guarded=['id'];

    public function shop()
    {
        
        return $this->belongsTo(Shop::class,'shop_id');
    }
    
    public function category()
    {
        
        return $this->belongsTo(Category::class,'category_id');
    }
}
