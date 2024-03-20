<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Status\StoreRequest;
use App\Http\Requests\Status\UpdateRequest;
use App\Models\Status;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StatusController extends Controller
{
  public function index()
  {
      $user = Auth::user();
      $statuses = Status::orderBy('id', 'DESC')->paginate(10);
      return view('admin.statuses.index', compact('statuses','user'));
  }

  public function show($status_slug)
  {
      $user = Auth::user();
      $item = Status::whereSlug($status_slug)->firstOrFail();
      return view('admin.statuses.show', compact('item','user'));
  }

  public function create()
  {
      $user = Auth::user();
      return view('admin.statuses.create', compact('user'));
  }
  public function store(StoreRequest $request)
  {
      $data = $request->validated();
      Status::firstOrCreate($data);
      return redirect()->route('admin.statuses.index')->with('status', 'item-created');
  }
  public function edit($status_slug)
  {
      $user = Auth::user();
      $item = Status::whereSlug($status_slug)->firstOrFail();
      return view('admin.statuses.edit', compact('user','item'));
  }
  public function update(UpdateRequest $request, $status_slug)
  {
      $status = Status::whereSlug($status_slug)->firstOrFail();
      $data = $request->validated();
      $status->update($data);
      return redirect()->route('admin.statuses.index')->with('status', 'item-updated');
  }

  public function destroy($status_slug)
  {
      $status = Status::whereSlug($status_slug)->firstOrFail();
      $status->delete();
      return redirect()->route('admin.statuses.index')->with('status', 'item-deleted');
  }

  public function search(Request $request)
  {
      $user = Auth::user();
      if (request('search') == null) :
          $statuses = Status::orderBy('id', 'DESC')->paginate(10);
      else :
          $statuses = Status::where('title', 'ilike', '%' . request('search') . '%')
          ->orWhere('slug', 'ilike', '%' . request('search') . '%')
          ->paginate(10);
      endif;
      return view('admin.status.index', compact('statuses','user'));
  }
}
