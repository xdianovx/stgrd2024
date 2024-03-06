<?php

namespace App\Providers;

use App\Models\Page;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::share('pages_routes', Page::$pages_routes);
        // View::share('categories_routes', Category::$categories_routes);
        // View::share('blogs_routes', Blog::$blogs_routes);
        // View::share('categories_blog_routes', CategoryBlog::$categories_blog_routes);
        // View::share('news_routes', News::$news_routes);
    }
}
