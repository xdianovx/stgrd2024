<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Block;
use App\Models\Management;
use App\Models\Page;
use App\Models\Vacancy;

class TeamPageController extends Controller
{
    public function index()
    {
        $page = Page::whereSlug('rukovodstvo')->firstOrFail();
        $block_vacancies = Block::whereSlug('rabota-dlia-vasstranica-rukovodstvo')->firstOrFail();
        $vacancies = Vacancy::all();
        $team = Management::all();
        return view('team', compact(
            'page',
            'team',
            'block_vacancies',
            'vacancies'
        ));
    }
}
