<?php

namespace App\Http\Controllers\Admin;

use auth;
use App\Models\Link;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LinkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $links = Link::where('user_id', auth()->id())->orderBy('created_at', 'desc')->simplePaginate(5);
        return view('admin.link.index', compact('links'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.link.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $inputs = $request->all();
        $inputs['user_id'] = auth()->id();
        $shop = Link::create($inputs);
        return redirect()->route('admin.link.index');
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
    public function edit(Link $link)
    {
        return view('admin.link.edit', compact('link'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Link $link)
    {
        $inputs = $request->all();
        $link->update($inputs);
        return redirect()->route('admin.link.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Link $link)
    {
        $result = $link->delete();
        return redirect()->route('admin.link.index');
    }
}
