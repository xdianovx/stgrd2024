<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Block;
use App\Models\Management;
use App\Models\Page;
use App\Models\Vacancy;

class VacancyPageController extends Controller
{
    public function index()
    {
        $page = Page::whereSlug('vakansii')->firstOrFail();
        $vacancies = Vacancy::all();
        return view('vacancy', compact(
            'page',
            'vacancies'
        ));
    }
}
