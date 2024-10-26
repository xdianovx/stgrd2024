<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Promotion;
use App\Models\Page;
use Illuminate\Http\Request;

class PromotionPageController extends Controller
{
    public function index()
    {
        $page = Page::whereId(5)->firstOrFail();
        $promotions = Promotion::orderBy('id', 'DESC')->paginate(10);
        $sliderPromotions = Promotion::where('slider', '1')->orderBy('id', 'DESC')->limit(3)->get();
        return view('promotions', compact(
            'page',
            'promotions',
            'sliderPromotions'
        ));
    }


    public function loadMore(Request $request)
    {
        $page = Page::whereId(4)->firstOrFail();
        $promotions = Promotion::orderBy('id', 'DESC')->offset($request->input('offset'))->limit(10)->get();
        return view('partials.promotions-list', compact(
            'page',
            'promotions'
        ))->render();
    }

    public function show($promotion_slug)
    {
        $item = Promotion::whereSlug($promotion_slug)->firstOrFail();
        $promotions = Promotion::where('id', '!=', $item->id)->orderBy('id', 'DESC')->limit(6)->get();
        return view('single_promotion', compact(
            'item',
            'promotions'
        ));
    }
}
