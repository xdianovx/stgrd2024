<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MainInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('admin.admin',compact('user'));
    }


    public function edit()
    {
        $user = Auth::user();
        $main_info = MainInfo::first();
        return view('admin.main_info_edit',compact('main_info','user'));
    }

    public function update(Request $request)
    {
        $main_info = MainInfo::first();
        $main_info->update($request->all());
        return redirect()->route('admin.index')->with('status', 'item-updated');
    }
}

