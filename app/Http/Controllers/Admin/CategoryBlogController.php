<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryBlog\StoreRequest;
use App\Http\Requests\CategoryBlog\UpdateRequest;
use App\Models\CategoryBlog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryBlogController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $categories_blog = CategoryBlog::orderBy('id', 'DESC')->paginate(10);
        return view('admin.category_blog.index', compact('categories_blog','user'));
    }

    public function show($category_slug)
    {
        $user = Auth::user();
        $item = CategoryBlog::whereSlug($category_slug)->firstOrFail();
        return view('admin.category_blog.show', compact('item','user'));
    }

    public function create()
    {
        $user = Auth::user();
        return view('admin.category_blog.create', compact('user'));
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();

        if ($request->hasFile('image')):
            $data['image'] = $this->loadFile($request,$data);
            endif;  
      
        $category = CategoryBlog::firstOrCreate($data);
        
        return redirect()->route('admin.categories_blog.index')->with('status', 'item-created');
    }
    public function edit($category_slug)
    {
        $user = Auth::user();
        $item = CategoryBlog::whereSlug($category_slug)->firstOrFail();
        return view('admin.category_blog.edit', compact('user','item'));
    }

    public function update(UpdateRequest $request, $category_slug)
    {
        $category = CategoryBlog::whereSlug($category_slug)->firstOrFail();
        $data = $request->validated();

        if ($request->hasFile('image')):
            $data['image'] = $this->loadFile($request,$data);
        endif;  

        $category->update($data);

        return redirect()->route('admin.categories_blog.index')->with('status', 'item-updated');

    }
    
    public function destroy($category_slug)
    {
        $category = CategoryBlog::whereSlug($category_slug)->firstOrFail();
        $category->delete();
        return redirect()->route('admin.categories_blog.index')->with('status', 'item-deleted');
    }

    public function search(Request $request)
    {
        $user = Auth::user();
        if (request('search') == null) :
            $categories = CategoryBlog::orderBy('id', 'DESC')->paginate(10);
        else :
            $categories = CategoryBlog::where('title', 'ilike', '%' . request('search') . '%')
            ->orWhere('slug', 'ilike', '%' . request('search') . '%')
            ->orWhere('id', 'ilike', '%' . request('search') . '%')
            ->paginate(10);
        endif;
        return view('admin.category_blog.index', compact('categories','user'));
    }
    protected function loadFile(Request $request,$data)
    {
        // Имя и расширение файла
        $filenameWithExt = $request->file('image')->getClientOriginalName();
        // Только оригинальное имя файла
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        $filename = str_replace(' ', '_', $filename);
        // Расширение
        $extention = $request->file('image')->getClientOriginalExtension();
        // Путь для сохранения
        $fileNameToStore = "image/" . $filename . "_" . time() . "." . $extention;
        // Сохраняем файл
        $data = $request->file('image')->storeAs('public', $fileNameToStore);
        return $data;
    }
}
