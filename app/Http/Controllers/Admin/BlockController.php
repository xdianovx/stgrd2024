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
        return view('admin.blocks.show', compact('item', 'user','numbers','advantages'));
    }

    // public function create()
    // {
    //     $user = Auth::user();

    //     return view('admin.blocks.create', compact('user'));
    // }
    // public function store(StoreRequest $request)
    // {
    //     $data = $request->validated();

    //     Block::firstOrCreate($data);

    //     return redirect()->route('admin.blocks.index')->with('status', 'item-created');
    // }
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

        $block->update($data);
        return redirect()->route('admin.blocks.index')->with('status', 'item-updated');
    }

    // public function destroy($block)
    // {

    //     $blog = Block::whereId($block)->firstOrFail();
    //     $blog->delete();
    //     return redirect()->route('admin.blocks.index')->with('status', 'item-deleted');
    // }

    public function search(Request $request)
    {
        $user = Auth::user();
        if (request('search') == null) :
            $blocks = Block::orderBy('id', 'DESC')->paginate(10);
        else :
            $blocks = Block::where('id', 'ilike', '%' . request('search') . '%')
                ->orWhere('title', 'ilike', '%' . request('search') . '%')
                ->paginate(10);
        endif;
        return view('admin.blocks.index', compact('blocks', 'user'));
    }

}
