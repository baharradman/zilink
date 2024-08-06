<?php

namespace App\Models;

use App\Models\Shop;
use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;
    protected $guarded=['id'];
    public function shops()
    {
        return $this->hasMany(Shop::class);
    }
    public function products()
    {
        return $this->hasMany(Product::class);
    }
    public function parent()
    {
        return $this->belongsTo($this,'parent_id')->with('parent');
    }
    public function children()
    {
        return $this->hasMany($this,'parent_id')->with('children');
    }

}
