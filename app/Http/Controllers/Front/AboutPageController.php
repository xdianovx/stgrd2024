<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Block;
use App\Models\Management;
use App\Models\Page;

class AboutPageController extends Controller
{
  public function index()
  {
    $page = Page::whereId(2)->firstOrFail();
    $block_missions = Block::whereId(3)->firstOrFail();
    $block_advantages = Block::whereId(4)->firstOrFail();
    $block_maps = Block::whereId(6)->firstOrFail();
    $block_companies = Block::whereId(5)->firstOrFail();
    $block_managements = Block::whereId(8)->firstOrFail();
    $team = Management::all();
    return view('about', compact(
      'page',
      'block_missions',
      'block_advantages',
      'block_companies',
      'block_maps',
      'team',
      'block_managements'
    ));
  }
}
