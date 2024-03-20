<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Advantage;
use App\Models\Block;
use App\Models\Page;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class WelcomePageController extends Controller
{
  public function index()
  {
    $page = Page::whereSlug('home')->firstOrFail();
    $block_missions = Block::whereSlug('mission')->firstOrFail();
    $block_advantages = Block::whereSlug('company_advantages')->firstOrFail();

    return view('welcome', compact(
      'block_missions',
      'block_advantages',
      'page',
    ));
  }
}
