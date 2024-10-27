<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Project;
use App\Models\Page;
use App\Models\Status;
use Illuminate\Http\Request;

class ProjectPageController extends Controller
{
    public function index()
    {
        $page = Page::whereId(3)->firstOrFail();
        $projects = Project::orderBy('id', 'DESC')->get();
        $projects_home = Project::where('home', '1')->get();
        $cities = City::all();
        $statuses = Status::all();
        $projects_planning_solutions = [];
        foreach ($projects as $project) {
            $project_ps = $project->planningSolutions->sortBy('price')->pluck('price')->unique()->values()->all();
            $projects_planning_solutions[$project->id] = $project_ps;
        }
        $projects_planning_solutions = array_merge(...array_values($projects_planning_solutions));
        $projects_planning_solutions = array_unique($projects_planning_solutions);
        return view('projects', compact(
            'page',
            'projects',
            'projects_home',
            'cities',
            'statuses',
            'projects_planning_solutions'
        ));
    }
public function filter(Request $request)
{
    $citySlug = $request->input('city');
    $statusSlug = $request->input('status');
    $minPrice = $request->input('min_price');
    $projects = Project::query();

    if ($citySlug !== 'null') {
        $projects->whereHas('city', function ($query) use ($citySlug) {
            $query->where('slug', $citySlug);
        });
    }

    if ($statusSlug !== 'null') {
        $projects->whereHas('status', function ($query) use ($statusSlug) {
            $query->where('slug', $statusSlug);
        });
    }

    if ($minPrice !== 'null') {
        $projects->whereHas('planningSolutions', function ($query) use ($minPrice) {
            $query->where('price', '>=', $minPrice);
        });
    }

    $projects = $projects->get();

    return view('components.project_item', compact('projects'));
}
}
