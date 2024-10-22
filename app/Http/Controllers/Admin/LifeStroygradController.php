<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LifeStroygradController extends Controller
{
  <?php

  namespace App\Http\Controllers\Admin;

  use App\Http\Controllers\Controller;
  use App\Http\Requests\LifeStroygrad\StoreRequest;
  use App\Http\Requests\LifeStroygrad\UpdateRequest;
  use App\Models\Block;
  use App\Models\LifeStroygrad;
  use Illuminate\Http\Request;
  use Illuminate\Support\Facades\Auth;

  class LifeStroygradController extends Controller
  {
    public function show($block_slug, $item)
    {
      $item = LifeStroygrad::whereId($item)->firstOrFail();
      $user = Auth::user();
      return view('admin.life_stroygrad_cards.show', compact('user', 'block_slug', 'item'));
    }

    public function create($block_slug)
    {
      $block = Block::whereSlug($block_slug)->firstOrFail();
      $user = Auth::user();
      return view('admin.life_stroygrad_cards.create', compact(
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
      $bonus = $block->life_stroygrad_cards()->create($data);

      return redirect()->route('admin.blocks.show', $block)->with('status', 'item-created');
    }
    public function edit($block_slug, $item)
    {
      $block = Block::whereSlug($block_slug)->firstOrFail();
      $item = LifeStroygrad::whereId($item)->firstOrFail();
      $user = Auth::user();

      return view('admin.life_stroygrad_cards.edit', compact(
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
      $item = LifeStroygrad::whereId($item)->firstOrFail();
      $item->update($data);


      return redirect()->route('admin.blocks.show', $block_slug)->with('status', 'item-updated');
    }

    public function destroy($block_slug, $item)
    {

      $item = LifeStroygrad::whereId($item)->firstOrFail();
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

}
