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
    $page = Page::whereSlug('glavnaia')->firstOrFail();
    $block_missions = Block::whereSlug('missiiastranica-glavnaia')->firstOrFail();
    $block_advantages = Block::whereSlug('preimushhestva-kompaniistranica-glavnaia')->firstOrFail();
    $block_life_stroygrads = Block::whereSlug('zizn-v-stroigradstranica-glavnaia')->firstOrFail();

    return view('welcome', compact(
      'block_missions',
      'block_advantages',
      'block_life_stroygrads',
      'page',
    ));
  }
}
