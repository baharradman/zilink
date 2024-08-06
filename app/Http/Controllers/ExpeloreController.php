<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class ExpeloreController extends Controller
{
    
    public function shop(Shop $shop)
    {
        return view('Expelore.shop',compact('shop'));
    }

    public function index(Request $request, Category $category = null)
    {
        //category selection
        if ($category) {
            $shops = $category->shops()->get();
        } else
            $shops = $category ?? [];

        //get categories
        $categories = Category::whereNull('parent_id')->get();
        return view('Expelore.expelore', compact('categories', 'shops'));
    }
}
