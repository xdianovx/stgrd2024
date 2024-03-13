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
  public function show($block, $item)
  {
      $item = Number::whereId($item)->firstOrFail();
      $user = Auth::user();
      return view('admin.numbers.show', compact('user','block','item'));
  }

  public function create($block)
  {
      $block = Block::whereId($block)->firstOrFail();
      $user = Auth::user();
      return view('admin.numbers.create', compact(
          'user',
          'block',
      ));
  }
  public function store(StoreRequest $request, $block)
  {
      $data = $request->validated();
      $block = Block::whereId($block)->firstOrFail();
      $bonus = $block->numbers()->create($data);

      return redirect()->route('admin.blocks.show',$block)->with('status', 'item-created');
  }
  public function edit($block, $item)
  {
      $block = Block::whereId($block)->firstOrFail();
      $item = Number::whereId($item)->firstOrFail();
      $user = Auth::user();

      return view('admin.numbers.edit', compact(
          'user',
          'block',
          'item'
      ));
  }
  public function update(UpdateRequest $request, $block, $item)
  {
      $data = $request->validated();

      $item = Number::whereId($item)->firstOrFail();
      $item->update($data);


      return redirect()->route('admin.blocks.show',$block)->with('status', 'item-updated');
  }

  public function destroy($block, $item)
  {

      $item = Number::whereId($item)->firstOrFail();
      $item->delete();
      return redirect()->route('admin.blocks.show',$block)->with('status', 'item-deleted');
  }
}
