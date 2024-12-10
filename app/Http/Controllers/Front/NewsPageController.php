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
        $news = News::orderBy('id', 'DESC')->paginate(12);
        $sliderNews = News::where('slider', '1')->orderBy('id', 'DESC')->limit(3)->get();
        $pageCount = $news->lastPage();
        $currentPage = $news->currentPage();
        return view('news', compact(
            'page',
            'news',
            'sliderNews',
            'pageCount',
            'currentPage'
        ));
    }
    public function loadMore(Request $request)
    {
      $news = News::latest()->paginate(6, ['*'], 'page', $request->page);
      $pageCount = $news->lastPage();
      $currentPage = $news->currentPage();

      return view('partials.news-list', compact('news', 'pageCount', 'currentPage'));
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
