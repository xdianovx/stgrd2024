<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Page\StoreRequest;
use App\Http\Requests\Page\UpdateRequest;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    public function create()
    {
        $user = Auth::user();
        return view('admin.page.create', compact('user'));
    }
    public function store(StoreRequest $request)
    {
        $data = $request->validated();

        if ($request->hasFile('image')) :
            $data['image'] = $this->loadFile($request, $data);
        endif;

        Page::firstOrCreate($data);

        return redirect()->route('admin.pages.index')->with('status', 'item-created');
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
        if ($request->hasFile('image')) :
            $data['image'] = $this->loadFile($request, $data);
        endif;
 

        $page->update($data);
        return redirect()->route('admin.pages.index')->with('status', 'item-updated');
    }

    public function destroy($page_slug)
    {

        $page = Page::whereSlug($page_slug)->firstOrFail();
        $page->delete();
        return redirect()->route('admin.pages.index')->with('status', 'item-deleted');
    }

    public function search(Request $request)
    {
        $user = Auth::user();
        if (request('search') == null) :
            $pages = Page::orderBy('id', 'DESC')->paginate(10);
        else :
            $pages = Page::where('id', 'ilike', '%' . request('search') . '%')
                ->orWhere('slug', 'ilike', '%' . request('search') . '%')
                ->orWhere('dashboard_title', 'ilike', '%' . request('search') . '%')
                ->paginate(10);
        endif;
        return view('admin.page.index', compact('pages', 'user'));
    }
    protected function loadFile(Request $request, $data)
    {
        if(key($request->file()) == "image"): 
            $image_oR_video = "image"; 
        else: 
            $image_oR_video = "video";
        endif;
        $filenameWithExt = $request->file($image_oR_video)->getClientOriginalName();
        // Только оригинальное имя файла
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        $filename = str_replace(' ', '_', $filename);
        // Расширение
        $extention = $request->file($image_oR_video)->getClientOriginalExtension();
        // Путь для сохранения
        $fileNameToStore = $image_oR_video . "/" . $filename . "_" . time() . "." . $extention;
        // Сохраняем файл
        $data = $request->file($image_oR_video)->storeAs('public', $fileNameToStore);
        return $data;
    }
}
