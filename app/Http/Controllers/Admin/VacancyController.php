<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Vacancy\StoreRequest;
use App\Http\Requests\Vacancy\UpdateRequest;
use App\Models\City;
use App\Models\Vacancy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class VacancyController extends Controller
{
  public function index()
  {
      $user = Auth::user();
      $vacancies = Vacancy::orderBy('id', 'DESC')->paginate(10);
      return view('admin.vacancies.index', compact('vacancies','user'));
  }

  public function show($vacanci_slug)
  {
      $user = Auth::user();
      $item = Vacancy::whereSlug($vacanci_slug)->firstOrFail();
      return view('admin.vacancies.show', compact('item','user'));
  }

  public function create()
  {
      $user = Auth::user();
      $cities = City::all();
      return view('admin.vacancies.create', compact('user','cities'));
  }
  public function store(StoreRequest $request)
  {
      $data = $request->validated();
      $data['slug'] = Str::slug($data['title'] . '-' . rand(100,999));

      $data = $this->changeTitleToId($data);
      Vacancy::firstOrCreate($data);
      return redirect()->route('admin.vacancies.index')->with('vacanci', 'item-created');
  }
  public function edit($vacanci_slug)
  {
      $user = Auth::user();
      $cities = City::all();
      $item = Vacancy::whereSlug($vacanci_slug)->firstOrFail();
      return view('admin.vacancies.edit', compact('user','item','cities'));
  }
  public function update(UpdateRequest $request, $vacanci_slug)
  {
      $vacanci = Vacancy::whereSlug($vacanci_slug)->firstOrFail();
      $data = $request->validated();
      $data['slug'] = Str::slug($data['title'] . '-' . rand(100,999));

      $data = $this->changeTitleToId($data);
      $vacanci->update($data);
      return redirect()->route('admin.vacancies.index')->with('vacanci', 'item-updated');
  }

  public function destroy($vacanci_slug)
  {
      $vacanci = Vacancy::whereSlug($vacanci_slug)->firstOrFail();
      $vacanci->delete();
      return redirect()->route('admin.vacancies.index')->with('vacanci', 'item-deleted');
  }

  public function search(Request $request)
  {
      $user = Auth::user();
      if (request('search') == null) :
          $vacancies = Vacancy::orderBy('id', 'DESC')->paginate(10);
      else :
          $vacancies = Vacancy::where('title', 'ilike', '%' . request('search') . '%')
          ->orWhere('slug', 'ilike', '%' . request('search') . '%')
          ->paginate(10);
      endif;
      return view('admin.vacancies.index', compact('vacancies','user'));
  }
  protected function changeTitleToId($data)
  {
    if (isset($data['city_id'])) :
      $data['city_id'] = City::where('title', $data['city_id'])->first()->id;
    endif;

    return $data;
  }
}
