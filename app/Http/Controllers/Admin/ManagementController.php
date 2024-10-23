<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Management\StoreRequest;
use App\Http\Requests\Management\UpdateRequest;
use App\Models\Management;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ManagementController extends Controller
{

  public function index()
  {
    $user = Auth::user();
    $managements = Management::orderBy('id', 'DESC')->paginate(10);
    return view('admin.managements.index', compact('user', 'managements'));
  }
  public function show($item)
  {
    $item = Management::whereId($item)->firstOrFail();
    $user = Auth::user();
    return view('admin.managements.show', compact('user', 'item'));
  }

  public function create()
  {
    $user = Auth::user();
    return view('admin.managements.create', compact(
      'user'
    ));
  }
  public function store(StoreRequest $request)
  {
    $data = $request->validated();
    if ($request->hasFile('image')) :
      $data['image'] = $this->loadFile($request, $data, 'image');
    endif;

    $item = Management::create($data);

    return redirect()->route('admin.managements.index')->with('status', 'item-created');
  }
  public function edit($item)
  {
    $item = Management::whereId($item)->firstOrFail();
    $user = Auth::user();

    return view('admin.managements.edit', compact(
      'user',
      'item'
    ));
  }
  public function update(UpdateRequest $request, $item)
  {
    $data = $request->validated();
    if ($request->hasFile('image')) :
      $data['image'] = $this->loadFile($request, $data, 'image');
    endif;
    $item = Management::whereId($item)->firstOrFail();
    $item->update($data);

    return redirect()->route('admin.managements.index')->with('status', 'item-updated');
  }

  public function destroy($item)
  {
    $item = Management::whereId($item)->firstOrFail();
    $item->delete();
    return redirect()->route('admin.managements.index')->with('status', 'item-deleted');
  }

  public function search(Request $request)
  {
      $user = Auth::user();
      if (request('search') == null) :
          $managements = Management::orderBy('id', 'DESC')->paginate(10);
      else :
          $managements = Management::where('id', 'ilike', '%' . request('search') . '%')
              ->orWhere('title', 'ilike', '%' . request('search') . '%')
              ->paginate(10);
      endif;
      return view('admin.managements.index', compact('managements', 'user'));
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
