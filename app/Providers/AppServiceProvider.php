<?php

namespace App\Providers;

use App\Models\Advantage;
use App\Models\Block;
use App\Models\City;
use App\Models\News;
use App\Models\Number;
use App\Models\Page;
use App\Models\Project;
use App\Models\Promotion;
use App\Models\Status;
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
        View::share('blocks_routes', Block::$blocks_routes);
        View::share('advantages_routes', Advantage::$advantages_routes);
        View::share('nums_routes', Number::$nums_routes);
        View::share('projects_routes', Project::$projects_routes);
        View::share('cities_routes', City::$cities_routes);
        View::share('statuses_routes', Status::$statuses_routes);
        View::share('promotions_routes', Promotion::$promotions_routes);
        View::share('news_routes', News::$news_routes);

        // View::share('blogs_routes', Blog::$blogs_routes);
        // View::share('categories_blog_routes', CategoryBlog::$categories_blog_routes);
        // View::share('news_routes', News::$news_routes);
    }
}
