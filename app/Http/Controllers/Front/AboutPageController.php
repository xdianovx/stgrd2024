<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Block;

class AboutPageController extends Controller
{
    public function index()
    {
        $block_missions = Block::whereSlug('mission')->firstOrFail();
        $block_advantages = Block::whereSlug('company_advantages')->firstOrFail();

        return view('about', compact(
            'block_missions',
            'block_advantages'
        ));
    }
}
