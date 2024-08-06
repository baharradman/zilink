<?php

namespace App\Models;

use App\Models\User;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use League\CommonMark\Extension\CommonMark\Node\Inline\Link;

class Shop extends Model
{
    use HasFactory ;
    protected $guarded=['id'];

    public function user()
    {
        
        return $this->belongsTo(User::class,'creator_id');
    }
    public function category()
    {
        
        return $this->belongsTo(Category::class,'category_id');
    }
    
    public function product()
    {
        return $this->hasMany(Product::class,'shop_id');
    }
    public function productActive()
    {
        return $this->hasMany(Product::class,'shop_id')->where('status',1);
    }
}
