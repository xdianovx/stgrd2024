<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Http\Requests\Company\StoreRequest;
use App\Http\Requests\Company\UpdateRequest;
use App\Models\Block;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class CompanyController extends Controller
{
  public function show($block_slug, $item_slug)
  {
      $item = Company::whereId($item_slug)->firstOrFail();
      $user = Auth::user();
      return view('admin.companies.show', compact('user','block_slug','item'));
  }

  public function create($block_slug)
  {
      $user = Auth::user();
      return view('admin.companies.create', compact(
          'user',
          'block_slug',
      ));
  }
  public function store(StoreRequest $request, $block_slug)
  {
      $data = $request->validated();
      $block = Block::whereSlug($block_slug)->firstOrFail();
      $bonus = $block->companies()->create($data);

      return redirect()->route('admin.blocks.show',$block_slug)->with('status', 'item-created');
  }
  public function edit($block_slug, $item)
  {
    $item = Company::whereId($item)->firstOrFail();
      $user = Auth::user();

      return view('admin.companies.edit', compact(
          'user',
          'block_slug',
          'item'
      ));
  }
  public function update(UpdateRequest $request, $block_slug, $item)
  {
      $data = $request->validated();
      $item = Company::whereId($item)->firstOrFail();
      $item->update($data);


      return redirect()->route('admin.blocks.show',$block_slug)->with('status', 'item-updated');
  }

  public function destroy($block_slug, $item)
  {

    $item = Company::whereId($item)->firstOrFail();
      $item->delete();
      return redirect()->route('admin.blocks.show',$block_slug)->with('status', 'item-deleted');
  }
}
