<?php

namespace App\Http\Controllers\Admin;

use App\Models\Shop;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Admin\StoreShopRequest;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $shops=Shop::where('creator_id',auth()->id())->orderBy('created_at','desc')->simplePaginate(5);
        return view('admin.shop.index',compact('shops'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $shopCategories = Category::with('children')->whereNull('parent_id')->get();
        return view('admin.shop.create',compact('shopCategories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreShopRequest $request)
    {
        $inputs = $request->all();
        $imagename=time().'.'.$request->profile_image->extension();
        $request->profile_image->move(public_path('images'),$imagename);
        $imagename='images/'.$imagename;
        $inputs['profile_image'] = $imagename;
        $inputs['creator_id'] = auth()->id();
        $shop = Shop::create($inputs);
        return redirect()->route('admin.shop.index');
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
    public function edit(Shop $shop)
    {
        $shopCategories=Category::all();
        return view('admin.shop.edit', compact(['shop','shopCategories']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreShopRequest $request,Shop $shop)
    {
      
        $inputs = $request->all();
        $shop->update($inputs);
        return redirect()->route('admin.shop.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Shop $shop)
    {   $result = $shop->delete();
        return redirect()->route('admin.shop.index');
    }
}
