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
        $page = Page::whereId(6)->firstOrFail();
        $block_vacancies = Block::whereId(9)->firstOrFail();
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
