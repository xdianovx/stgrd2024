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
        $promotions = Promotion::orderBy('id', 'DESC')->paginate(12);
        $sliderPromotions = Promotion::where('slider', '1')->orderBy('id', 'DESC')->limit(3)->get();
        $pageCount = $promotions->lastPage();
        $currentPage = $promotions->currentPage();
        return view('promotions', compact(
            'page',
            'promotions',
            'sliderPromotions',
            'pageCount',
            'currentPage'
        ));
    }
    public function loadMore(Request $request)
    {
      $promotions = Promotion::latest()->paginate(6, ['*'], 'page', $request->page);
      $pageCount = $promotions->lastPage();
      $currentPage = $promotions->currentPage();

      return view('partials.promotions-list', compact('promotions', 'pageCount', 'currentPage'));
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
