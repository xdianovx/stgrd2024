<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Review\StoreRequest;
use App\Http\Requests\Review\UpdateRequest;
use App\Models\Block;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
  public function show($block_slug, $item)
  {
    $item = Review::whereId($item)->firstOrFail();
    $user = Auth::user();
    return view('admin.reviews.show', compact('user', 'block_slug', 'item'));
  }

  public function create($block_slug)
  {
    $block = Block::whereSlug($block_slug)->firstOrFail();
    $user = Auth::user();
    return view('admin.reviews.create', compact(
      'user',
      'block',
      'block_slug'
    ));
  }
  public function store(StoreRequest $request, $block_slug)
  {
    $data = $request->validated();
    if ($request->hasFile('photo')) :
      $data['photo'] = $this->loadFile($request, $data, 'photo');
    endif;
    if ($request->hasFile('video')) :
      $data['video'] = $this->loadFile($request, $data, 'video');
    endif;
    $block = Block::whereSlug($block_slug)->firstOrFail();
    $bonus = $block->reviews()->create($data);

    return redirect()->route('admin.blocks.show', $block)->with('status', 'item-created');
  }
  public function edit($block_slug, $item)
  {
    $block = Block::whereSlug($block_slug)->firstOrFail();
    $item = Review::whereId($item)->firstOrFail();
    $user = Auth::user();

    return view('admin.reviews.edit', compact(
      'user',
      'block',
      'block_slug',
      'item'
    ));
  }
  public function update(UpdateRequest $request, $block_slug, $item)
  {
    $data = $request->validated();
    if ($request->hasFile('photo')) :
      $data['photo'] = $this->loadFile($request, $data, 'photo');
    endif;
    if ($request->hasFile('video')) :
      $data['video'] = $this->loadFile($request, $data, 'video');
    endif;
    $item = Review::whereId($item)->firstOrFail();
    $item->update($data);


    return redirect()->route('admin.blocks.show', $block_slug)->with('status', 'item-updated');
  }

  public function destroy($block_slug, $item)
  {

    $item = Review::whereId($item)->firstOrFail();
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
