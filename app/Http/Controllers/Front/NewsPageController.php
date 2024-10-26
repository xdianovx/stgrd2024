<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Block;
use App\Models\Management;
use App\Models\News;
use App\Models\Page;
use Illuminate\Http\Request;

class NewsPageController extends Controller
{
    public function index()
    {
        $page = Page::whereId(4)->firstOrFail();
        $news = News::orderBy('id', 'DESC')->paginate(10);
        $sliderNews = News::where('slider', '1')->orderBy('id', 'DESC')->limit(3)->get();
        return view('news', compact(
            'page',
            'news',
            'sliderNews'
        ));
    }


    public function loadMore(Request $request)
    {
        $page = Page::whereId(4)->firstOrFail();
        $news = News::orderBy('id', 'DESC')->offset($request->input('offset'))->limit(10)->get();
        return view('partials.news-list', compact(
            'page',
            'news'
        ))->render();
    }

    public function show($news_slug)
    {
        $item = News::whereSlug($news_slug)->firstOrFail();
        $news = News::where('id', '!=', $item->id)->orderBy('id', 'DESC')->limit(6)->get();
        return view('single_news', compact(
            'item',
            'news'
        ));
    }
}
