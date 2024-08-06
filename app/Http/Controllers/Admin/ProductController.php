<?php

namespace App\Http\Controllers\Admin;

use App\Models\Shop;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Admin\ProductRequest;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $shops=Shop::where('creator_id',auth()->id())->get();
        // $products = Product::where('shop_id')->orderBy('created_at','desc')->simplePaginate(5);
        return view('admin.product.index', compact('shops'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories= Category::with('children')->whereNull('parent_id')->get();
        $userid=auth()->id();
        $usershops = Shop::where('creator_id',$userid)->get();
        return view('admin.product.create', compact('categories','usershops'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request)
    {
    
        $imagename=time().'.'.$request->image->extension();
        $request->image->move(public_path('images'),$imagename);
        $imagename='images/'.$imagename;
        $inputs = $request->all();
        $inputs['image'] = $imagename;
        $product = Product::create($inputs);
        
        return redirect()->route('admin.product.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $userid=auth()->id();
        $usershops = Shop::where('creator_id',$userid)->get();
        return view('admin.product.edit', compact('product','usershops'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductRequest $request, Product $product)
    {
        $inputs = $request->all();
        $product->update($inputs);
        return redirect()->route('admin.product.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $result = $product->delete();
        return redirect()->route('admin.product.index');
    }
}
