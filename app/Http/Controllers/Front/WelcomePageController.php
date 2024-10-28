<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Block;
use App\Models\Promotion;
use App\Models\Page;
use App\Models\Project;

class WelcomePageController extends Controller
{
  public function index()
  {
    $page = Page::whereId(1)->firstOrFail();
    $block_missions = Block::whereId(1)->firstOrFail();
    $block_advantages = Block::whereId(2)->firstOrFail();
    $block_life_stroygrads = Block::whereId(7)->firstOrFail();
    $promotions = Promotion::orderBy('id', 'DESC')->limit(6)->get();
    $projects_home = Project::where('home', '1')->get();
    return view('welcome', compact(
      'block_missions',
      'block_advantages',
      'block_life_stroygrads',
      'page',
      'promotions',
      'projects_home'
    ));
  }
}
