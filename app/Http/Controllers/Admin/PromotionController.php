<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Promotion\StoreRequest;
use App\Http\Requests\Promotion\UpdateRequest;
use App\Models\Project;
use App\Models\Promotion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PromotionController extends Controller
{
  public function index()
  {
      $user = Auth::user();
      $promotions = Promotion::orderBy('id', 'DESC')->paginate(10);
      return view('admin.promotions.index', compact('promotions', 'user'));
  }

  public function show($promotion_slug)
  {
      $user = Auth::user();
      $item = Promotion::whereSlug($promotion_slug)->firstOrFail();
      return view('admin.promotions.show', compact('item', 'user'));
  }

  public function create()
  {
      $user = Auth::user();
      $projects = Project::all();
      return view('admin.promotions.create', compact('user','projects'));
  }
  public function store(StoreRequest $request)
  {
      $data = $request->validated();
      $split_data = $this->cutArraysFromRequest($data);
      $data = $split_data['data'];
      if ($request->hasFile('image')) :
          $data['image'] = $this->loadFile($request, $data,'image');
      endif;

      $promotion = Promotion::firstOrCreate($data);
      $this->writeDataToTable($promotion, $split_data['projectsIds']);

      return redirect()->route('admin.promotions.index')->with('status', 'item-created');
  }
  public function edit($promotion_slug)
  {
      $user = Auth::user();
      $projects = Project::all();
      $item = Promotion::whereSlug($promotion_slug)->firstOrFail();

      return view('admin.promotions.edit', compact('user', 'item','projects'));
  }
  public function update(UpdateRequest $request, $promotion_slug)
  {
    $promotion = Promotion::whereSlug($promotion_slug)->firstOrFail();
    $data = $request->validated();

    $split_data = $this->cutArraysFromRequest($data);
    $data = $split_data['data'];
    if ($request->hasFile('image')) :
        $data['image'] = $this->loadFile($request, $data,'image');
    endif;
    $promotion->update($data);

    $this->writeDataToTable($promotion, $split_data['projectsIds']);

    return redirect()->route('admin.promotions.index')->with('status', 'item-updated');
  }

  public function destroy($promotion_slug)
  {

      $promotion = Promotion::whereSlug($promotion_slug)->firstOrFail();
      $promotion->delete();
      return redirect()->route('admin.promotions.index')->with('status', 'item-deleted');
  }

  public function search(Request $request)
  {
      $user = Auth::user();
      if (request('search') == null) :
          $promotions = Promotion::orderBy('id', 'DESC')->paginate(10);
      else :
          $promotions = Promotion::where('id', 'ilike', '%' . request('search') . '%')
              ->orWhere('slug', 'ilike', '%' . request('search') . '%')
              ->orWhere('title', 'ilike', '%' . request('search') . '%')
              ->paginate(10);
      endif;
      return view('admin.promotions.index', compact('promotions', 'user'));
  }

  protected function cutArraysFromRequest($data)
  {

      if (isset($data['projects'])) :
          $projectsIds = $data['projects'];
          unset($data['projects']);
      endif;
      return [
          'data' => $data,
          'projectsIds' => $projectsIds ?? null,
      ];
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
  protected function writeDataToTable($item, $projectsIds)
  {
      if (isset($projectsIds)) :
          foreach ($projectsIds as $key => $value) :
              $projects_id = DB::table('projects')
                  ->where('title', $value)
                  ->first()->id;
              $projectsIds[$key] = $projects_id;
          endforeach;
          $item->projects()->sync($projectsIds);
      else:
          $item->projects()->sync($projectsIds);
      endif;
  }
}
