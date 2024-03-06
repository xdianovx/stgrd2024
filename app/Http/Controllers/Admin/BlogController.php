<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Blog\StoreRequest;
use App\Http\Requests\Blog\UpdateRequest;
use App\Models\Blog;
use App\Models\CategoryBlog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $blogs = Blog::orderBy('id', 'DESC')->paginate(10);
        return view('admin.blogs.index', compact('blogs', 'user'));
    }

    public function show($blog_slug)
    {
        $user = Auth::user();
        $item = Blog::whereSlug($blog_slug)->firstOrFail();
        return view('admin.blogs.show', compact('item', 'user'));
    }

    public function create()
    {
        $user = Auth::user();
        $categories = CategoryBlog::all();

        return view('admin.blogs.create', compact('user','categories'));
    }
    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        $data = $this->changeTitleToId($data);
        if ($request->hasFile('image')) :
            $data['image'] = $this->loadFile($request, $data);
        endif;
        if ($request->hasFile('video')) :
            $data['video'] = $this->loadFile($request, $data);
        endif;
        Blog::firstOrCreate($data);

        return redirect()->route('admin.blogs.index')->with('status', 'item-created');
    }
    public function edit($blog_slug)
    {
        $user = Auth::user();
        $item = Blog::whereSlug($blog_slug)->firstOrFail();
        $categories = CategoryBlog::all();

        return view('admin.blogs.edit', compact('user', 'item','categories'));
    }
    public function update(UpdateRequest $request, $blog_slug)
    {
        $blog = Blog::whereSlug($blog_slug)->firstOrFail();
        $data = $request->validated();
        $data = $this->changeTitleToId($data);
        if ($request->hasFile('image')) :
            $data['image'] = $this->loadFile($request, $data);
        endif;
        if ($request->hasFile('video')) :
            $data['video'] = $this->loadFile($request, $data);
        endif;

        $blog->update($data);
        return redirect()->route('admin.blogs.index')->with('status', 'item-updated');
    }

    public function destroy($blog_slug)
    {

        $blog = Blog::whereSlug($blog_slug)->firstOrFail();
        $blog->delete();
        return redirect()->route('admin.blogs.index')->with('status', 'item-deleted');
    }

    public function search(Request $request)
    {
        $user = Auth::user();
        if (request('search') == null) :
            $blogs = Blog::orderBy('id', 'DESC')->paginate(10);
        else :
            $blogs = Blog::where('id', 'ilike', '%' . request('search') . '%')
                ->orWhere('slug', 'ilike', '%' . request('search') . '%')
                ->orWhere('title', 'ilike', '%' . request('search') . '%')
                ->paginate(10);
        endif;
        return view('admin.blogs.index', compact('blogs', 'user'));
    }
    protected function changeTitleToId($data)
    {
         if (isset($data['category_id'])) :  
            $data['category_id'] = CategoryBlog::where('title',$data['category_id'])->first()->id;
         endif;
         return $data;
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
