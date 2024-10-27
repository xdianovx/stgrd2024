<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PlanningSolution\StoreRequest;
use App\Http\Requests\PlanningSolution\UpdateRequest;
use App\Models\PlanningSolution;
use App\Models\Project;
use App\Models\ProjectBlock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PlanningSolutionController extends Controller
{
  public function show($project_slug, $item)
  {
    $item = PlanningSolution::whereId($item)->firstOrFail();
    $user = Auth::user();
    return view('admin.planning_solutions.show', compact('user','project_slug', 'item'));
  }

  public function create($project_slug)
  {
    $user = Auth::user();
    return view('admin.planning_solutions.create', compact(
      'user',
      'project_slug',
    ));
  }
  public function store(StoreRequest $request, $project_slug)
  {
    $data = $request->validated();
    if ($request->hasFile('plan')) :
      $data['plan'] = $this->loadFile($request, $data, 'plan');
    endif;
    $project = Project::whereSlug($project_slug)->firstOrFail();
    $project->planningSolutions()->create($data);

    return redirect()->route('admin.projects.show', [$project_slug])->with('status', 'item-created');
  }
  public function edit($project_slug, $item)
  {
    $item = PlanningSolution::whereId($item)->firstOrFail();
    $user = Auth::user();

    return view('admin.planning_solutions.edit', compact(
      'user',
      'project_slug',
      'item'
    ));
  }
  public function update(UpdateRequest $request, $project_slug, $item)
  {
    $data = $request->validated();
    if ($request->hasFile('plan')) :
      $data['plan'] = $this->loadFile($request, $data,'plan');
    endif;
    $item = PlanningSolution::whereId($item)->firstOrFail();
    $item->update($data);


    return redirect()->route('admin.projects.show', [$project_slug])->with('status', 'item-updated');
  }

  public function destroy($project_slug, $item)
  {

    $item = PlanningSolution::whereId($item)->firstOrFail();
    $item->delete();
    return redirect()->route('admin.projects.show', [$project_slug])->with('status', 'item-deleted');
  }
  protected function loadFile(Request $request, $data, $key)
  {

    // Имя и расширение файла
    $filenameWithExt = $request->file($key)->getClientOriginalName();
    // Только оригинальное имя файла
    $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
    $filename = str_replace(' ', '_', $filename);
    // Расширение
    $extention = $request->file($key)->getClientOriginalExtension();
    // Путь для сохранения
    $fileNameToStore = "$key/" . $filename . "_" . time() . "." . $extention;
    // Сохраняем файл
    $data = $request->file($key)->storeAs('public', $fileNameToStore);
    return $data;
  }
}
