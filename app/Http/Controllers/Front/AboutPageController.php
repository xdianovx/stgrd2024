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
        $page = Page::whereSlug('o-kompanii')->firstOrFail();
        $block_missions = Block::whereSlug('missiiastranica-o-kompanii')->firstOrFail();
        $block_advantages = Block::whereSlug('preimushhestva-kompaniistranica-o-kompanii')->firstOrFail();
        $block_maps = Block::whereSlug('karta-obieektovstranica-o-kompanii')->firstOrFail();
        $block_companies = Block::whereSlug('predpriiatiia-gruppystranica-o-kompanii')->firstOrFail();
        $block_managements = Block::whereSlug('rukovodstvostranica-o-kompanii')->firstOrFail();
        $team = Management::take(5)->get();
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
