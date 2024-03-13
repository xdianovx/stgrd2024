<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\News\StoreRequest;
use App\Http\Requests\News\UpdateRequest;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NewsController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $news = News::orderBy('id', 'DESC')->paginate(10);
        return view('admin.news.index', compact('news', 'user'));
    }

    public function show($news_slug)
    {
        $user = Auth::user();
        $item = News::whereSlug($news_slug)->firstOrFail();
        return view('admin.news.show', compact('item', 'user'));
    }

    public function create()
    {
        $user = Auth::user();

        return view('admin.news.create', compact('user'));
    }
    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        if ($request->hasFile('image')) :
            $data['image'] = $this->loadFile($request, $data);
        endif;
        if ($request->hasFile('video')) :
            $data['video'] = $this->loadFile($request, $data);
        endif;
        News::firstOrCreate($data);

        return redirect()->route('admin.news.index')->with('status', 'item-created');
    }
    public function edit($news_slug)
    {
        $user = Auth::user();
        $item = News::whereSlug($news_slug)->firstOrFail();

        return view('admin.news.edit', compact('user', 'item'));
    }
    public function update(UpdateRequest $request, $news_slug)
    {
        $news = News::whereSlug($news_slug)->firstOrFail();
        $data = $request->validated();
        if ($request->hasFile('image')) :
            $data['image'] = $this->loadFile($request, $data);
        endif;
        if ($request->hasFile('video')) :
            $data['video'] = $this->loadFile($request, $data);
        endif;

        $news->update($data);
        return redirect()->route('admin.news.index')->with('status', 'item-updated');
    }

    public function destroy($news_slug)
    {

        $news = News::whereSlug($news_slug)->firstOrFail();
        $news->delete();
        return redirect()->route('admin.news.index')->with('status', 'item-deleted');
    }

    public function search(Request $request)
    {
        $user = Auth::user();
        if (request('search') == null) :
            $news = News::orderBy('id', 'DESC')->paginate(10);
        else :
            $news = News::where('id', 'ilike', '%' . request('search') . '%')
                ->orWhere('slug', 'ilike', '%' . request('search') . '%')
                ->orWhere('title', 'ilike', '%' . request('search') . '%')
                ->paginate(10);
        endif;
        return view('admin.news.index', compact('news', 'user'));
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
