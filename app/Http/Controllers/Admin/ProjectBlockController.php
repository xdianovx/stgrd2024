<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProjectBlock\UpdateRequest;
use App\Models\ProjectBlock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjectBlockController extends Controller
{
  public function show($project_slug, $project_block_slug)
  {
    $user = Auth::user();
    $item = ProjectBlock::whereSlug($project_block_slug)->firstOrFail();
    $planning_solutions = $item->planning_solutions()->paginate(10);
    $facilities = $item->facilities()->paginate(10);
    $map_points = $item->map_points()->paginate(10);
    $project_images = $item->project_images()->paginate(14);
    $construction_stages = $item->construction_stages()->paginate(14);
    $documents = $item->documents()->paginate(10);


    return view('admin.project_blocks.show', compact(
      'item',
      'project_slug',
      'user',
      'planning_solutions',
      'facilities',
      'map_points',
      'project_images',
      'construction_stages',
      'documents'
    ));
  }

  public function edit($project_slug, $project_block_slug)
  {
    $user = Auth::user();
    $item = ProjectBlock::whereSlug($project_block_slug)->firstOrFail();

    return view('admin.project_blocks.edit', compact('user', 'project_slug', 'item'));
  }
  public function update(UpdateRequest $request, $project_slug, $project_block_slug)
  {
    $project_block = ProjectBlock::whereSlug($project_block_slug)->firstOrFail();
    $data = $request->validated();

    $project_block->update($data);
    return redirect()->route('admin.projects.show', $project_slug)->with('status', 'item-updated');
  }
}
