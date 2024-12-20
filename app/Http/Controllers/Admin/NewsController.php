<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\News\StoreRequest;
use App\Http\Requests\News\UpdateRequest;
use App\Models\News;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;


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
        $projects = Project::all();
        return view('admin.news.create', compact('user','projects'));
    }
    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        //if (!array_key_exists('slider', $data)) {
            $data['slider'] = '0';
        //}
        $data['slug'] = Str::slug($data['title'] . '-' . now()->format('d-m-Y'));
        if ($request->hasFile('image')) :
            $data['image'] = $this->loadFile($request, $data,'image');
        endif;

        $news = News::firstOrCreate($data);

        return redirect()->route('admin.news.index')->with('status', 'item-created');
    }
    public function edit($news_slug)
    {
        $user = Auth::user();
        $projects = Project::all();
        $item = News::whereSlug($news_slug)->firstOrFail();

        return view('admin.news.edit', compact('user', 'item','projects'));
    }
    public function update(UpdateRequest $request, $news_slug)
    {
      $news = News::whereSlug($news_slug)->firstOrFail();
      $data = $request->validated();
      // if (!array_key_exists('slider', $data)) {
        $data['slider'] = '0';
    // }
      $data['slug'] = Str::slug($data['title'] . '-' . now()->format('d-m-Y'));
      if ($request->hasFile('image')) :
          $data['image'] = $this->loadFile($request, $data,'image');
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
