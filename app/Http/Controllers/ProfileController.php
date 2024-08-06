<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('assets.profile.index');
    }

    public function update(Request $request)
    {
    
        $inputs = [
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'mobile'=>$request->mobile,
        ];
        
        $user=Auth::user();
        $user->update($inputs);
        return redirect()->route('profile.index');

    }
}
