<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use App\Models\User;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $shops = Shop::where('status', 1)->get();
    $categories = Category::where('status', 1)->get();
    return view('assets.home', compact(['shops','categories']));
  }
}
