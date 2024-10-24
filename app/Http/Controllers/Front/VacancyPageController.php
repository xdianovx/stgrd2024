<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Block;
use App\Models\City;
use App\Models\Management;
use App\Models\Page;
use App\Models\Review;
use App\Models\Vacancy;

class VacancyPageController extends Controller
{
    public function index()
    {
        $page = Page::whereId(7)->firstOrFail();
        $block_review = Block::whereId(10)->firstOrFail();
        $vacancies = Vacancy::all();
        $cities = City::all();
        $reviews = Review::all();
        return view('vacancy', compact(
            'page',
            'block_review',
            'vacancies',
            'cities',
            'reviews',
        ));
    }

    public function filterByCity($citySlug)
    {
        $vacancies = Vacancy::whereHas('city', function ($query) use ($citySlug) {
            $query->whereSlug($citySlug);
        })->get();

        return view('components.vacancy-item', compact(
            'vacancies',
        ));
    }
}
