<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Advantage\StoreRequest;
use App\Http\Requests\Advantage\UpdateRequest;
use App\Models\Block;
use App\Models\Advantage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdvantageController extends Controller
{
  public function show($block_slug, $item)
  {
    $item = Advantage::whereId($item)->firstOrFail();
    $user = Auth::user();
    return view('admin.advantages.show', compact('user', 'block_slug', 'item'));
  }

  public function create($block_slug)
  {
    $block = Block::whereSlug($block_slug)->firstOrFail();
    $user = Auth::user();
    return view('admin.advantages.create', compact(
      'user',
      'block',
      'block_slug'
    ));
  }
  public function store(StoreRequest $request, $block_slug)
  {
    $data = $request->validated();
    if ($request->hasFile('image')) :
      $data['image'] = $this->loadFile($request, $data, 'image');
    endif;
    $block = Block::whereSlug($block_slug)->firstOrFail();
    $bonus = $block->advantages()->create($data);

    return redirect()->route('admin.blocks.show', $block)->with('status', 'item-created');
  }
  public function edit($block_slug, $item)
  {
    $block = Block::whereSlug($block_slug)->firstOrFail();
    $item = Advantage::whereId($item)->firstOrFail();
    $user = Auth::user();

    return view('admin.advantages.edit', compact(
      'user',
      'block',
      'block_slug',
      'item'
    ));
  }
  public function update(UpdateRequest $request, $block_slug, $item)
  {
    $data = $request->validated();
    if ($request->hasFile('image')) :
      $data['image'] = $this->loadFile($request, $data, 'image');
    endif;
    $item = Advantage::whereId($item)->firstOrFail();
    $item->update($data);


    return redirect()->route('admin.blocks.show', $block_slug)->with('status', 'item-updated');
  }

  public function destroy($block_slug, $item)
  {

    $item = Advantage::whereId($item)->firstOrFail();
    $item->delete();
    return redirect()->route('admin.blocks.show', $block_slug)->with('status', 'item-deleted');
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
