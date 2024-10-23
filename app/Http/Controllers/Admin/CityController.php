<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\City\StoreRequest;
use App\Http\Requests\City\UpdateRequest;
use App\Models\City;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class CityController extends Controller
{
  public function index()
  {
      $user = Auth::user();
      $cities = City::orderBy('id', 'DESC')->paginate(10);
      return view('admin.cities.index', compact('cities','user'));
  }

  public function show($city_slug)
  {
      $user = Auth::user();
      $item = City::whereSlug($city_slug)->firstOrFail();
      return view('admin.cities.show', compact('item','user'));
  }

  public function create()
  {
      $user = Auth::user();
      return view('admin.cities.create', compact('user'));
  }
  public function store(StoreRequest $request)
  {
      $data = $request->validated();
      $data['slug'] = Str::slug($data['title']);
      City::firstOrCreate($data);
      return redirect()->route('admin.cities.index')->with('status', 'item-created');
  }
  public function edit($city_slug)
  {
      $user = Auth::user();
      $item = City::whereSlug($city_slug)->firstOrFail();
      return view('admin.cities.edit', compact('user','item'));
  }
  public function update(UpdateRequest $request, $city_slug)
  {
      $city = City::whereSlug($city_slug)->firstOrFail();
      $data = $request->validated();
      $data['slug'] = Str::slug($data['title']);
      $city->update($data);
      return redirect()->route('admin.cities.index')->with('status', 'item-updated');
  }

  public function destroy($city_slug)
  {
      $city = City::whereSlug($city_slug)->firstOrFail();
      $city->delete();
      return redirect()->route('admin.cities.index')->with('status', 'item-deleted');
  }

  public function search(Request $request)
  {
      $user = Auth::user();
      if (request('search') == null) :
          $cities = City::orderBy('id', 'DESC')->paginate(10);
      else :
          $cities = City::where('title', 'ilike', '%' . request('search') . '%')
          ->orWhere('slug', 'ilike', '%' . request('search') . '%')
          ->paginate(10);
      endif;
      return view('admin.cities.index', compact('cities','user'));
  }
}
