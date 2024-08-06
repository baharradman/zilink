<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminDashboardController extends Controller
{
   public function __construct()
   {
      if (!Auth::check()) {
         redirect(route('auth.login-register-form'))->send();
      }
   }
   public function index()
   {
      $user = User::where('id', auth()->id())->get()->first();
      return view('admin.index',compact('user'));
   }
}
