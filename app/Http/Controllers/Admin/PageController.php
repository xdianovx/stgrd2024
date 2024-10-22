<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Page\StoreRequest;
use App\Http\Requests\Page\UpdateRequest;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class PageController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $pages = Page::orderBy('id', 'DESC')->paginate(10);
        return view('admin.page.index', compact('pages', 'user'));
    }

    public function show($page_slug)
    {
        $user = Auth::user();
        $item = Page::whereSlug($page_slug)->firstOrFail();
        return view('admin.page.show', compact('item', 'user'));
    }

    public function edit($page_slug)
    {
        $user = Auth::user();
        $item = Page::whereSlug($page_slug)->firstOrFail();
        return view('admin.page.edit', compact('user', 'item'));
    }

    public function update(UpdateRequest $request, $page_slug)
    {
        $page = Page::whereSlug($page_slug)->firstOrFail();
        $data = $request->validated();
        $data['slug'] = Str::slug($data['title']);
        if ($request->hasFile('video_preview')) :
            $data['video_preview'] = $this->loadFile($request, $data, 'video_preview');
        endif;
        if ($request->hasFile('video_in_player')) :
            $data['video_in_player'] = $this->loadFile($request, $data, 'video_in_player');
        endif;

        $page->update($data);
        return redirect()->route('admin.pages.index')->with('status', 'item-updated');
    }
    protected function loadFile(Request $request, $data, $key)
    {
        $filenameWithExt = $request->file($key)->getClientOriginalName();
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        $filename = str_replace(' ', '_', $filename);
        $extention = $request->file($key)->getClientOriginalExtension();
        $fileNameToStore = $key . "/" . $filename . "_" . time() . "." . $extention;
        $data = $request->file($key)->storeAs('public', $fileNameToStore);
        return $data;
    }
}
