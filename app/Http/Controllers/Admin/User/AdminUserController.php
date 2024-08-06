<?php

namespace App\Http\Controllers\Admin\User;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class AdminUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $admins = User::where('user_type', 1)->get();
        return view('admin.user.admin-user.index', compact('admins'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.user.admin-user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $inputs = $request->all();
        $imagename=time().'.'.$request->profile_photo_path->extension();
        $request->profile_photo_path->move(public_path('images'),$imagename);
        $imagename='images/'.$imagename;
        $inputs['profile_photo_path'] = $imagename;
        $inputs['user_type'] = 1;
        $user=User::where('email',$inputs['email'])->get()->first();
        $user->update($inputs);
        return redirect()->route('admin.user.admin-user.index')->with('swal-success', 'ادمین جدید با موفقیت ثبت شد');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $admin)
    {
        return view('admin.user.admin-user.edit', compact('admin'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $admin)
    {
        
        $inputs = $request->all();
        $admin->update($inputs);
        return redirect()->route('admin.user.admin-user.index')->with('swal-success', 'ادمین سایت شما با موفقیت ویرایش شد');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( User $admin)
    {
        $result = $admin->forceDelete();
        return redirect()->route('admin.user.admin-user.index')->with('swal-success', 'ادمین شما با موفقیت حذف شد');
    }
}
