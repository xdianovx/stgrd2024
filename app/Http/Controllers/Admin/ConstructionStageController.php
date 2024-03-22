<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ConstructionStage\StoreRequest;
use App\Http\Requests\ConstructionStage\UpdateRequest;
use App\Models\ConstructionStage;
use App\Models\ProjectBlock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ConstructionStageController extends Controller
{
  public function show($project_slug, $project_block_slug, $item)
  {
    $item = ConstructionStage::whereId($item)->firstOrFail();
    $user = Auth::user();
    return view('admin.construction_stages.show', compact('user','project_slug','project_block_slug', 'item'));
  }

  public function create($project_slug, $project_block_slug)
  {
    $user = Auth::user();
    return view('admin.construction_stages.create', compact(
      'user',
      'project_slug',
      'project_block_slug',
    ));
  }
  public function store(StoreRequest $request, $project_slug, $project_block_slug)
  {
    $data = $request->validated();
    if ($request->hasFile('image')) :
      $data['image'] = $this->loadFile($request, $data, 'image');
    endif;
    $construction_stage = ProjectBlock::whereSlug($project_block_slug)->firstOrFail();
    $construction_stage->construction_stages()->create($data);

    return redirect()->route('admin.projects.project_block_show', [$project_slug, $project_block_slug])->with('status', 'item-created');
  }
  public function edit($project_slug, $project_block_slug, $item)
  {
    $item = ConstructionStage::whereId($item)->firstOrFail();
    $user = Auth::user();

    return view('admin.construction_stages.edit', compact(
      'user',
      'project_slug',
      'project_block_slug',
      'item'
    ));
  }
  public function update(UpdateRequest $request, $project_slug, $project_block_slug, $item)
  {
    $data = $request->validated();
    if ($request->hasFile('image')) :
      $data['image'] = $this->loadFile($request, $data,'image');
    endif;
    $item = ConstructionStage::whereId($item)->firstOrFail();
    $item->update($data);


    return redirect()->route('admin.projects.project_block_show', [$project_slug, $project_block_slug])->with('status', 'item-updated');
  }

  public function destroy($project_slug, $project_block_slug, $item)
  {

    $item = ConstructionStage::whereId($item)->firstOrFail();
    $item->delete();
    return redirect()->route('admin.projects.project_block_show', [$project_slug, $project_block_slug])->with('status', 'item-deleted');
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
