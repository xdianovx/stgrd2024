<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MapPoint\StoreRequest;
use App\Http\Requests\MapPoint\UpdateRequest;
use App\Models\MapPoint;
use App\Models\ProjectBlock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MapPointController extends Controller
{
  public function show($project_slug, $project_block_slug, $item)
  {
    $item = MapPoint::whereId($item)->firstOrFail();
    $user = Auth::user();
    return view('admin.map_points.show', compact('user','project_slug','project_block_slug', 'item'));
  }

  public function create($project_slug, $project_block_slug)
  {
    $user = Auth::user();
    return view('admin.map_points.create', compact(
      'user',
      'project_slug',
      'project_block_slug',
    ));
  }
  public function store(StoreRequest $request, $project_slug, $project_block_slug)
  {
    $data = $request->validated();

    $map_point = ProjectBlock::whereSlug($project_block_slug)->firstOrFail();
    $map_point->map_points()->create($data);

    return redirect()->route('admin.projects.project_block_show', [$project_slug, $project_block_slug])->with('status', 'item-created');
  }
  public function edit($project_slug, $project_block_slug, $item)
  {
    $item = MapPoint::whereId($item)->firstOrFail();
    $user = Auth::user();

    return view('admin.map_points.edit', compact(
      'user',
      'project_slug',
      'project_block_slug',
      'item'
    ));
  }
  public function update(UpdateRequest $request, $project_slug, $project_block_slug, $item)
  {
    $data = $request->validated();

    $item = MapPoint::whereId($item)->firstOrFail();
    $item->update($data);


    return redirect()->route('admin.projects.project_block_show', [$project_slug, $project_block_slug])->with('status', 'item-updated');
  }

  public function destroy($project_slug, $project_block_slug, $item)
  {

    $item = MapPoint::whereId($item)->firstOrFail();
    $item->delete();
    return redirect()->route('admin.projects.project_block_show', [$project_slug, $project_block_slug])->with('status', 'item-deleted');
  }

}
