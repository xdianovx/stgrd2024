<?php

use App\Http\Controllers\Admin\MainController;
use App\Http\Controllers\Admin\PageController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/projects', function () {
    return view('projects');
})->name('projects');

Route::get('/projects/{slug}', function () {
    return view('project');
})->name('projects.view');


Route::get('/news', function () {
    return view('news');
})->name('news');

Route::get('/news/{id}', function () {
    return view('singlenews');
})->name('news.view');

Route::get('/stock', function () {
    return view('stock');
})->name('stock');

Route::get('/stock/{slug}', function () {
    return view('singlestock');
})->name('stock.view');


Route::get('/team', function () {
    return view('team');
})->name('team');

Route::get('/vacancy', function () {
    return view('vacancy');
})->name('vacancy');

Route::get('/contacts', function () {
    return view('contacts');
})->name('contacts');







Route::middleware('auth')->name('admin.')->prefix('admin')->group(function () {

    Route::get('/dashboard', [MainController::class, 'index'])->name('index');

    // Route::name('bonus_cards.')->prefix('bonus_cards')->group(function () {
    //     Route::get('/', [BonusCardController::class, 'index'])->name('index');
    //     Route::get('/search',  [BonusCardController::class, 'search'])->name('search');
    //     Route::get('/create', [BonusCardController::class, 'create'])->name('create');
    //     Route::post('/store', [BonusCardController::class, 'store'])->name('store');
    //     Route::get('/{bonus_card_slug}', [BonusCardController::class, 'show'])->name('show');
    //     Route::get('/{bonus_card_slug}/edit', [BonusCardController::class, 'edit'])->name('edit');
    //     Route::patch('/{bonus_card_slug}/update', [BonusCardController::class, 'update'])->name('update');
    //     Route::delete('/{bonus_card_slug}', [BonusCardController::class, 'destroy'])->name('destroy'); 
    // });
    Route::name('pages.')->prefix('pages')->group(function () {
        Route::get('/', [PageController::class, 'index'])->name('index');
        Route::get('/search',  [PageController::class, 'search'])->name('search');
        Route::get('/create', [PageController::class, 'create'])->name('create');
        Route::post('/store', [PageController::class, 'store'])->name('store');
        Route::get('/{page_slug}', [PageController::class, 'show'])->name('show');
        Route::get('/{page_slug}/edit', [PageController::class, 'edit'])->name('edit');
        Route::patch('/{page_slug}', [PageController::class, 'update'])->name('update');
        Route::delete('/{page_slug}', [PageController::class, 'destroy'])->name('destroy');
    });
    // Route::name('casinos.')->prefix('casinos')->group(function () {
    //     Route::get('/', [CasinoController::class, 'index'])->name('index');
    //     Route::get('/search',  [CasinoController::class, 'search'])->name('search');
    //     Route::get('/create', [CasinoController::class, 'create'])->name('create');
    //     Route::post('/store', [CasinoController::class, 'store'])->name('store');
    //     Route::get('/{casino_slug}', [CasinoController::class, 'show'])->name('show');
    //     Route::get('/{casino_slug}/edit', [CasinoController::class, 'edit'])->name('edit');
    //     Route::patch('/{casino_slug}/update', [CasinoController::class, 'update'])->name('update');
    //     Route::delete('/{casino_slug}', [CasinoController::class, 'destroy'])->name('destroy');
    //     // sign_up_bonuses
    //     Route::get('/casinos/{casino_slug}/sign_up_bonuses/create', [SignUpBonusController::class, 'create'])->name('sign_up_bonus_create');
    //     Route::post('/casinos/{casino_slug}/sign_up_bonuses/store', [SignUpBonusController::class, 'store'])->name('sign_up_bonus_store');
    //     Route::get('/casinos/{casino_slug}/sign_up_bonuses/{sign_up_bonus}', [SignUpBonusController::class, 'show'])->name('sign_up_bonus_show');
    //     Route::get('/casinos/{casino_slug}/sign_up_bonuses/{sign_up_bonus}/edit', [SignUpBonusController::class, 'edit'])->name('sign_up_bonus_edit');
    //     Route::patch('/casinos/{casino_slug}/sign_up_bonuses/{sign_up_bonus}', [SignUpBonusController::class, 'update'])->name('sign_up_bonus_update');
    //     Route::delete('/casinos/{casino_slug}/sign_up_bonuses/{sign_up_bonus}', [SignUpBonusController::class, 'destroy'])->name('sign_up_bonus_destroy');
    // });
    // Route::name('categories.')->prefix('categories')->group(function () {
    //     Route::get('/', [CategoryController::class, 'index'])->name('index');
    //     Route::get('/search',  [CategoryController::class, 'search'])->name('search');
    //     Route::get('/create', [CategoryController::class, 'create'])->name('create');
    //     Route::get('/{category_slug}/create-child-category',  [CategoryController::class, 'createChild'])->name('create_child');
    //     Route::post('/store', [CategoryController::class, 'store'])->name('store');
    //     Route::get('/{category_slug}', [CategoryController::class, 'show'])->name('show');
    //     Route::get('/{category_slug}/edit', [CategoryController::class, 'edit'])->name('edit');
    //     Route::get('/{category_parent_slug}/edit-child-category/{category_slug}',  [CategoryController::class, 'editChild'])->name('edit_child');
    //     Route::patch('/{category_slug}/update', [CategoryController::class, 'update'])->name('update');
    //     Route::delete('/{category_slug}', [CategoryController::class, 'destroy'])->name('destroy');
    // });

    // Route::name('categories_blog.')->prefix('categories_blog')->group(function () {
    //     Route::get('/', [CategoryBlogController::class, 'index'])->name('index');
    //     Route::get('/search',  [CategoryBlogController::class, 'search'])->name('search');
    //     Route::get('/create', [CategoryBlogController::class, 'create'])->name('create');
    //     Route::post('/store', [CategoryBlogController::class, 'store'])->name('store');
    //     Route::get('/{category_blog_slug}', [CategoryBlogController::class, 'show'])->name('show');
    //     Route::get('/{category_blog_slug}/edit', [CategoryBlogController::class, 'edit'])->name('edit');
    //     Route::patch('/{category_blog_slug}', [CategoryBlogController::class, 'update'])->name('update');
    //     Route::delete('/{category_blog_slug}', [CategoryBlogController::class, 'destroy'])->name('destroy');
    // });
    // Route::name('blogs.')->prefix('blogs')->group(function () {
    //     Route::get('/', [BlogController::class, 'index'])->name('index');
    //     Route::get('/search',  [BlogController::class, 'search'])->name('search');
    //     Route::get('/create', [BlogController::class, 'create'])->name('create');
    //     Route::post('/store', [BlogController::class, 'store'])->name('store');
    //     Route::get('/{blog_slug}', [BlogController::class, 'show'])->name('show');
    //     Route::get('/{blog_slug}/edit', [BlogController::class, 'edit'])->name('edit');
    //     Route::patch('/{blog_slug}', [BlogController::class, 'update'])->name('update');
    //     Route::delete('/{blog_slug}', [BlogController::class, 'destroy'])->name('destroy');
    // });
    // Route::name('news.')->prefix('news')->group(function () {
    //     Route::get('/', [NewsController::class, 'index'])->name('index');
    //     Route::get('/search',  [NewsController::class, 'search'])->name('search');
    //     Route::get('/create', [NewsController::class, 'create'])->name('create');
    //     Route::post('/store', [NewsController::class, 'store'])->name('store');
    //     Route::get('/{news_slug}', [NewsController::class, 'show'])->name('show');
    //     Route::get('/{news_slug}/edit', [NewsController::class, 'edit'])->name('edit');
    //     Route::patch('/{news_slug}', [NewsController::class, 'update'])->name('update');
    //     Route::delete('/{news_slug}', [NewsController::class, 'destroy'])->name('destroy');
    // });
    // Route::name('licenses.')->prefix('licenses')->group(function () {
    //     Route::get('/', [LicensesOrgsController::class, 'index'])->name('index');
    //     Route::get('/search',  [LicensesOrgsController::class, 'search'])->name('search');
    //     Route::get('/create', [LicensesOrgsController::class, 'create'])->name('create');
    //     Route::post('/store', [LicensesOrgsController::class, 'store'])->name('store');
    //     Route::get('/{licens}', [LicensesOrgsController::class, 'show'])->name('show');
    //     Route::get('/{licens}/edit', [LicensesOrgsController::class, 'edit'])->name('edit');
    //     Route::patch('/{licens}', [LicensesOrgsController::class, 'update'])->name('update');
    //     Route::delete('/{licens}', [LicensesOrgsController::class, 'destroy'])->name('destroy');
    // });
    // Route::name('certificates.')->prefix('certificates')->group(function () {
    //     Route::get('/', [CertificatesOrgsController::class, 'index'])->name('index');
    //     Route::get('/search',  [CertificatesOrgsController::class, 'search'])->name('search');
    //     Route::get('/create', [CertificatesOrgsController::class, 'create'])->name('create');
    //     Route::post('/store', [CertificatesOrgsController::class, 'store'])->name('store');
    //     Route::get('/{certificat}', [CertificatesOrgsController::class, 'show'])->name('show');
    //     Route::get('/{certificat}/edit', [CertificatesOrgsController::class, 'edit'])->name('edit');
    //     Route::patch('/{certificat}', [CertificatesOrgsController::class, 'update'])->name('update');
    //     Route::delete('/{certificat}', [CertificatesOrgsController::class, 'destroy'])->name('destroy');
    // });
    //     Route::name('games.')->prefix('games')->group(function () {
    //     Route::get('/', [GameController::class, 'index'])->name('index');
    //     Route::get('/search',  [GameController::class, 'search'])->name('search');
    //     Route::get('/create', [GameController::class, 'create'])->name('create');
    //     Route::post('/store', [GameController::class, 'store'])->name('store');
    //     Route::get('/{game_slug}', [GameController::class, 'show'])->name('show');
    //     Route::get('/{game_slug}/edit', [GameController::class, 'edit'])->name('edit');
    //     Route::patch('/{game_slug}', [GameController::class, 'update'])->name('update');
    //     Route::delete('/{game_slug}', [GameController::class, 'destroy'])->name('destroy');
    // });
    // Route::name('category_help_centers.')->prefix('category_help_centers')->group(function () {
    //     Route::get('/', [CategoryHelpCenterController::class, 'index'])->name('index');
    //     Route::get('/search',  [CategoryHelpCenterController::class, 'search'])->name('search');
    //     Route::get('/create', [CategoryHelpCenterController::class, 'create'])->name('create');
    //     Route::post('/store', [CategoryHelpCenterController::class, 'store'])->name('store');
    //     Route::get('/{category_help_center_slug}', [CategoryHelpCenterController::class, 'show'])->name('show');
    //     Route::get('/{category_help_center_slug}/edit', [CategoryHelpCenterController::class, 'edit'])->name('edit');
    //     Route::patch('/{category_help_center_slug}/update', [CategoryHelpCenterController::class, 'update'])->name('update');
    //     Route::delete('/{category_help_center_slug}', [CategoryHelpCenterController::class, 'destroy'])->name('destroy');
    // });
    // Route::name('help_centers.')->prefix('help_centers')->group(function () {
    //     Route::get('/', [HelpCenterController::class, 'index'])->name('index');
    //     Route::get('/search',  [HelpCenterController::class, 'search'])->name('search');
    //     Route::get('/create', [HelpCenterController::class, 'create'])->name('create');
    //     Route::post('/store', [HelpCenterController::class, 'store'])->name('store');
    //     Route::get('/{help_center_slug}', [HelpCenterController::class, 'show'])->name('show');
    //     Route::get('/{help_center_slug}/edit', [HelpCenterController::class, 'edit'])->name('edit');
    //     Route::patch('/{help_center_slug}/update', [HelpCenterController::class, 'update'])->name('update');
    //     Route::delete('/{help_center_slug}', [HelpCenterController::class, 'destroy'])->name('destroy');
    // });
});