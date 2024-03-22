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
    $data = $this->changeTitleToId($data);

    if ($request->hasFile('poster')) :
      $data['poster'] = $this->loadFile($request, $data, 'poster');
    endif;
    if ($request->hasFile('presentation')) :
      $data['presentation'] = $this->loadFile($request, $data, 'presentation');
    endif;
    $project = Project::firstOrCreate($data);
    $project->createBlocks([
      [
        'title_left' => 'Информация',
        'slug' => 'information',
        'active' => true,
        'project_id' => $project->id
      ],
      [
        'title_left' => 'Удобства',
        'slug' => 'facilities',
        'active' => true,
        'project_id' => $project->id
      ],
      [
        'title_left' => 'Инфраструктура',
        'slug' => 'infrastructure',
        'active' => true,
        'project_id' => $project->id
      ],
      [
        'title_left' => 'Визуализации',
        'slug' => 'visualizations',
        'active' => true,
        'project_id' => $project->id
      ],
      [
        'title_left' => 'Ход строительства',
        'slug' => 'construction_progress',
        'active' => true,
        'project_id' => $project->id
      ],
      [
        'title_left' => 'Документация',
        'slug' => 'documentation',
        'active' => true,
        'project_id' => $project->id
      ],
    ]);

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
    $data = $this->changeTitleToId($data);

    if ($request->hasFile('poster')) :
      $data['poster'] = $this->loadFile($request, $data, 'poster');
    endif;
    if ($request->hasFile('presentation')) :
      $data['presentation'] = $this->loadFile($request, $data, 'presentation');
    endif;
    $project->update($data);
    return redirect()->route('admin.projects.index')->with('status', 'item-updated');
  }

  public function destroy($project_slug)
  {

    $project = Project::whereSlug($project_slug)->firstOrFail();
    foreach($project->blocks as $block):
      if($block->slug == 'information'):
        $block->planning_solutions()->delete();
      endif;
      if($block->slug == 'facilities'):
        $block->facilities()->delete();
      endif;
      if($block->slug == 'infrastructure'):
        $block->map_points()->delete();
      endif;
      if($block->slug == 'visualizations'):
        $block->project_images()->delete();
      endif;
    endforeach;
    $project->blocks()->delete();
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
