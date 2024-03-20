<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PlanningSolution\StoreRequest;
use App\Http\Requests\PlanningSolution\UpdateRequest;
use App\Models\Block;
use App\Models\PlanningSolution;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PlanningSolutionController extends Controller
{
  public function show($block, $item)
  {
    $item = PlanningSolution::whereId($item)->firstOrFail();
    $user = Auth::user();
    return view('admin.planning_solutions.show', compact('user', 'block', 'item'));
  }

  public function create($block)
  {
    $block = Block::whereId($block)->firstOrFail();
    $user = Auth::user();
    return view('admin.planning_solutions.create', compact(
      'user',
      'block',
    ));
  }
  public function store(StoreRequest $request, $block)
  {
    $data = $request->validated();
    if ($request->hasFile('plan')) :
      $data['plan'] = $this->loadFile($request, $data, 'plan');
    endif;
    $block = Block::whereId($block)->firstOrFail();
    $bonus = $block->planning_solutions()->create($data);

    return redirect()->route('admin.blocks.show', $block)->with('status', 'item-created');
  }
  public function edit($block, $item)
  {
    $block = Block::whereId($block)->firstOrFail();
    $item = PlanningSolution::whereId($item)->firstOrFail();
    $user = Auth::user();

    return view('admin.planning_solutions.edit', compact(
      'user',
      'block',
      'item'
    ));
  }
  public function update(UpdateRequest $request, $block, $item)
  {
    $data = $request->validated();
    if ($request->hasFile('plan')) :
      $data['plan'] = $this->loadFile($request, $data,'plan');
    endif;
    $item = PlanningSolution::whereId($item)->firstOrFail();
    $item->update($data);


    return redirect()->route('admin.blocks.show', $block)->with('status', 'item-updated');
  }

  public function destroy($block, $item)
  {

    $item = PlanningSolution::whereId($item)->firstOrFail();
    $item->delete();
    return redirect()->route('admin.blocks.show', $block)->with('status', 'item-deleted');
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
