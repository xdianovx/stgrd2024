<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Block\StoreRequest;
use App\Http\Requests\Block\UpdateRequest;
use App\Models\Block;
use App\Models\CategoryBlock;
use App\Models\Number;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class BlockController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $blocks = Block::orderBy('id', 'DESC')->paginate(10);
        return view('admin.blocks.index', compact('blocks', 'user'));
    }

    public function show($block_slug)
    {
        $user = Auth::user();
        $item = Block::whereSlug($block_slug)->firstOrFail();
        $numbers = $item->numbers()->paginate(10);
        $advantages = $item->advantages()->paginate(10);
        $companies = $item->companies()->paginate(10);
        return view('admin.blocks.show', compact('item', 'user','numbers','advantages','companies'));
    }

    public function edit($block_slug)
    {
        $user = Auth::user();
        $item = Block::whereSlug($block_slug)->firstOrFail();

        return view('admin.blocks.edit', compact('user', 'item'));
    }
    public function update(UpdateRequest $request, $block_slug)
    {
        $block = Block::whereSlug($block_slug)->firstOrFail();
        $data = $request->validated();
        $data['slug'] = Str::slug($data['title']);
        $block->update($data);
        return redirect()->route('admin.blocks.index')->with('status', 'item-updated');
    }

}
