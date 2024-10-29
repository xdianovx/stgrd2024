<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Project\StoreRequest;
use App\Http\Requests\Project\UpdateRequest;
use App\Models\Block;
use App\Models\City;
use App\Models\Project;
use App\Models\Status;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
  public function index()
  {
    $user = Auth::user();
    $projects = Project::orderBy('id', 'DESC')->paginate(10);
    return view('admin.projects.index', compact('projects', 'user'));
  }

  public function show($project_slug)
  {
    $user = Auth::user();
    $item = Project::whereSlug($project_slug)->firstOrFail();
    return view('admin.projects.show', compact('item', 'user'));
  }

  public function create()
  {
    $user = Auth::user();
    $statuses = Status::all();
    $cities = City::all();
    return view('admin.projects.create', compact('user', 'statuses', 'cities'));
  }
  public function store(StoreRequest $request)
  {
    $data = $request->validated();
    if (array_key_exists('home', $data) && $data['home'] == '1') {
      $homeProject = Project::where('home', '1')->first();
      if ($homeProject) {
        $homeProject->update(['home' => '0']);
      }
    }
    if (!array_key_exists('home', $data)) {
      $data['home'] = '0';
    }
    $data['slug'] = Str::slug($data['title']);
    $data = $this->changeTitleToId($data);
    $data['comfort'] = json_encode($data['comfort']);
    if ($request->hasFile('image')) :
      $data['image'] = $this->loadFile($request, $data, 'image');
    endif;

    $project = Project::firstOrCreate($data);

    return redirect()->route('admin.projects.index')->with('status', 'item-created');
  }
  public function edit($project_slug)
  {
    $user = Auth::user();
    $statuses = Status::all();
    $cities = City::all();
    $item = Project::whereSlug($project_slug)->firstOrFail();
    return view('admin.projects.edit', compact('user', 'item', 'statuses', 'cities'));
  }
  public function update(UpdateRequest $request, $project_slug)
  {
    $project = Project::whereSlug($project_slug)->firstOrFail();
    $data = $request->validated();
    if (array_key_exists('home', $data) && $data['home'] == '1') {
      $homeProject = Project::where('home', '1')->first();
      if ($homeProject) {
        $homeProject->update(['home' => '0']);
      }
    }
    if (!array_key_exists('home', $data)) {
      $data['home'] = '0';
    }
    $data['slug'] = Str::slug($data['title']);
    $data = $this->changeTitleToId($data);
    $data['comfort'] = json_encode($data['comfort']);
    if ($request->hasFile('image')) :
      $data['image'] = $this->loadFile($request, $data, 'image');
    endif;
    $project->update($data);
    return redirect()->route('admin.projects.index')->with('status', 'item-updated');
  }

  public function destroy($project_slug)
  {
    $project = Project::whereSlug($project_slug)->firstOrFail();
    $project->delete();
    return redirect()->route('admin.projects.index')->with('status', 'item-deleted');
  }

  public function search(Request $request)
  {
    $user = Auth::user();
    if (request('search') == null) :
      $projects = Project::orderBy('id', 'DESC')->paginate(10);
    else :
      $projects = Project::where('id', 'ilike', '%' . request('search') . '%')
        ->orWhere('title', 'ilike', '%' . request('search') . '%')
        ->orWhere('slug', 'ilike', '%' . request('search') . '%')
        ->paginate(10);
    endif;
    return view('admin.projects.index', compact('projects', 'user'));
  }
  protected function changeTitleToId($data)
  {
    if (isset($data['city_id'])) :
      $data['city_id'] = City::where('title', $data['city_id'])->first()->id;
    endif;
    if (isset($data['status_id'])) :
      $data['status_id'] = Status::where('title', $data['status_id'])->first()->id;
    endif;

    return $data;
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
