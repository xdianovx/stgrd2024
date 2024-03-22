<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Number\StoreRequest;
use App\Http\Requests\Number\UpdateRequest;
use App\Models\Block;
use App\Models\Number;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NumberController extends Controller
{
  public function show($block_slug, $item)
  {
      $item = Number::whereId($item)->firstOrFail();
      $user = Auth::user();
      return view('admin.numbers.show', compact('user','block_slug','item'));
  }

  public function create($block_slug)
  {
      $user = Auth::user();
      return view('admin.numbers.create', compact(
          'user',
          'block_slug',
      ));
  }
  public function store(StoreRequest $request, $block_slug)
  {
      $data = $request->validated();
      $block = Block::whereSlug($block_slug)->firstOrFail();
      $bonus = $block->numbers()->create($data);

      return redirect()->route('admin.blocks.show',$block_slug)->with('status', 'item-created');
  }
  public function edit($block_slug, $item)
  {
      $item = Number::whereId($item)->firstOrFail();
      $user = Auth::user();

      return view('admin.numbers.edit', compact(
          'user',
          'block_slug',
          'item'
      ));
  }
  public function update(UpdateRequest $request, $block_slug, $item)
  {
      $data = $request->validated();

      $item = Number::whereId($item)->firstOrFail();
      $item->update($data);


      return redirect()->route('admin.blocks.show',$block_slug)->with('status', 'item-updated');
  }

  public function destroy($block_slug, $item)
  {

      $item = Number::whereId($item)->firstOrFail();
      $item->delete();
      return redirect()->route('admin.blocks.show',$block_slug)->with('status', 'item-deleted');
  }
}
