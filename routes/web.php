<?php

use App\Http\Controllers\Admin\AdvantageController;
use App\Http\Controllers\Admin\BlockController;
use App\Http\Controllers\Admin\CityController;
use App\Http\Controllers\Admin\CompanyController;
use App\Http\Controllers\Admin\ConstructionStageController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\DocumentController;
use App\Http\Controllers\Admin\EditorImageUploadController;
use App\Http\Controllers\Admin\FacilitieController;
use App\Http\Controllers\Admin\LifeStroygradController;
use App\Http\Controllers\Admin\MainController;
use App\Http\Controllers\Admin\ManagementController;
use App\Http\Controllers\Admin\MapPointController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\NumberController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\PlanningSolutionController;
use App\Http\Controllers\Admin\ProjectBlockController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\ProjectImageController;
use App\Http\Controllers\Admin\PromotionController;
use App\Http\Controllers\Admin\ReviewController;
use App\Http\Controllers\Admin\StatusController;
use App\Http\Controllers\Admin\VacancyController;
use App\Http\Controllers\Front\RequestsController;
use App\Http\Controllers\Front\WelcomePageController;
use App\Http\Controllers\Front\AboutPageController;
use App\Http\Controllers\Front\ContactPageController;
use App\Http\Controllers\Front\NewsPageController;
use App\Http\Controllers\Front\ProjectPageController;
use App\Http\Controllers\Front\PromotionPageController;
use App\Http\Controllers\Front\TeamPageController;
use App\Http\Controllers\Front\VacancyPageController;
use App\Models\Promotion;
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

Route::get('/', [WelcomePageController::class, 'index'])->name('home');

Route::get('/about', [AboutPageController::class, 'index'])->name('about');

Route::get('/projects', [ProjectPageController::class, 'index'])->name('projects');
Route::get('/projects/filter', [ProjectPageController::class, 'filter'])->name('projects.filter');
// Route::get('/projects/{slug}', function () {
//   return view('project');
// })->name('projects.view');


Route::get('/news',  [NewsPageController::class, 'index'])->name('news');
Route::get('/news/{news_slug}', [NewsPageController::class, 'show'])->name('news.show');
Route::post('/news/load-more', [NewsPageController::class, 'loadMore'])->name('news.loadMore');

Route::get('/promotions',  [PromotionPageController::class, 'index'])->name('promotions');
Route::get('/promotions/{promotion_slug}', [PromotionPageController::class, 'show'])->name('promotions.show');
Route::post('/promotions/load-more', [PromotionPageController::class, 'loadMore'])->name('promotions.loadMore');


Route::get('/team', [TeamPageController::class, 'index'])->name('team');

Route::get('/vacancy',  [VacancyPageController::class, 'index'])->name('vacancy');
Route::get('/vacancy/{citySlug}', [VacancyPageController::class, 'filterByCity'])->name('vacancy.filterByCity');

Route::get('/contacts',  [ContactPageController::class, 'index'])->name('contacts');

Route::post('/request_vacancy_section', [RequestsController::class, 'request_vacancy_section'])->name('request_vacancy_section');
Route::post('/request_consultation_vacancy_section', [RequestsController::class, 'request_consultation_vacancy_section'])->name('request_consultation_vacancy_section');
Route::post('/request_cooperation_section', [RequestsController::class, 'request_cooperation_section'])->name('request_cooperation_section');
Route::post('/request_consultation_section', [RequestsController::class, 'request_consultation_section'])->name('request_consultation_section');
Route::post('/request_mailing_section', [RequestsController::class, 'request_mailing_section'])->name('request_mailing_section');


Route::middleware('auth')->name('admin.')->prefix('admin')->group(function () {

  Route::get('/', [MainController::class, 'index'])->name('index');
  Route::get('/main-info/edit', [MainController::class, 'edit'])->name('main_info.edit');
  Route::patch('/main-info/update', [MainController::class, 'update'])->name('main_info.update');
  Route::post('/editor-uploads', EditorImageUploadController::class)->name('image_upload');


  Route::name('pages.')->prefix('pages')->group(function () {
    Route::get('/', [PageController::class, 'index'])->name('index');
    Route::get('/search',  [PageController::class, 'search'])->name('search');
    // Route::get('/create', [PageController::class, 'create'])->name('create');
    // Route::post('/store', [PageController::class, 'store'])->name('store');
    Route::get('/{page_slug}', [PageController::class, 'show'])->name('show');
    Route::get('/{page_slug}/edit', [PageController::class, 'edit'])->name('edit');
    Route::patch('/{page_slug}', [PageController::class, 'update'])->name('update');
    // Route::delete('/{page_slug}', [PageController::class, 'destroy'])->name('destroy');
  });
  Route::name('blocks.')->prefix('blocks')->group(function () {
    Route::get('/', [BlockController::class, 'index'])->name('index');
    Route::get('/search',  [BlockController::class, 'search'])->name('search');
    // Route::get('/create', [BlockController::class, 'create'])->name('create');
    // Route::post('/store', [BlockController::class, 'store'])->name('store');
    Route::get('/{block_slug}', [BlockController::class, 'show'])->name('show');
    Route::get('/{block_slug}/edit', [BlockController::class, 'edit'])->name('edit');
    Route::patch('/{block_slug}', [BlockController::class, 'update'])->name('update');
    // Route::delete('/{block_slug}', [BlockController::class, 'destroy'])->name('destroy');
    //numbers
    Route::get('/{block}/numbers/create', [NumberController::class, 'create'])->name('number_create');
    Route::post('/{block}/numbers/store', [NumberController::class, 'store'])->name('number_store');
    Route::get('/{block}/numbers/{number}', [NumberController::class, 'show'])->name('number_show');
    Route::get('/{block}/numbers/{number}/edit', [NumberController::class, 'edit'])->name('number_edit');
    Route::patch('/{block}/numbers/{number}', [NumberController::class, 'update'])->name('number_update');
    Route::delete('/{block}/numbers/{number}', [NumberController::class, 'destroy'])->name('number_destroy');
    //advantages
    Route::get('/{block}/advantages/create', [AdvantageController::class, 'create'])->name('advantage_create');
    Route::post('/{block}/advantages/store', [AdvantageController::class, 'store'])->name('advantage_store');
    Route::get('/{block}/advantages/{advantage}', [AdvantageController::class, 'show'])->name('advantage_show');
    Route::get('/{block}/advantages/{advantage}/edit', [AdvantageController::class, 'edit'])->name('advantage_edit');
    Route::patch('/{block}/advantages/{advantage}', [AdvantageController::class, 'update'])->name('advantage_update');
    Route::delete('/{block}/advantages/{advantage}', [AdvantageController::class, 'destroy'])->name('advantage_destroy');

    //companies
    Route::get('/{block}/companies/create', [CompanyController::class, 'create'])->name('company_create');
    Route::post('/{block}/companies/store', [CompanyController::class, 'store'])->name('company_store');
    Route::get('/{block}/companies/{company}', [CompanyController::class, 'show'])->name('company_show');
    Route::get('/{block}/companies/{company}/edit', [CompanyController::class, 'edit'])->name('company_edit');
    Route::patch('/{block}/companies/{company}', [CompanyController::class, 'update'])->name('company_update');
    Route::delete('/{block}/companies/{company}', [CompanyController::class, 'destroy'])->name('company_destroy');

    //life_story_grads
    Route::get('/{block}/life_stroygrad_cards/create', [LifeStroygradController::class, 'create'])->name('life_stroygrad_card_create');
    Route::post('/{block}/life_stroygrad_cards/store', [LifeStroygradController::class, 'store'])->name('life_stroygrad_card_store');
    Route::get('/{block}/life_stroygrad_cards/{life_stroygrad_card}', [LifeStroygradController::class, 'show'])->name('life_stroygrad_card_show');
    Route::get('/{block}/life_stroygrad_cards/{life_stroygrad_card}/edit', [LifeStroygradController::class, 'edit'])->name('life_stroygrad_card_edit');
    Route::patch('/{block}/life_stroygrad_cards/{life_stroygrad_card}', [LifeStroygradController::class, 'update'])->name('life_stroygrad_card_update');
    Route::delete('/{block}/life_stroygrad_cards/{life_stroygrad_card}', [LifeStroygradController::class, 'destroy'])->name('life_stroygrad_card_destroy');

    // Rewiews
    Route::get('/{block}/reviews/create', [ReviewController::class, 'create'])->name('review_create');
    Route::post('/{block}/reviews/store', [ReviewController::class, 'store'])->name('review_store');
    Route::get('/{block}/reviews/{review}', [ReviewController::class, 'show'])->name('review_show');
    Route::get('/{block}/reviews/{review}/edit', [ReviewController::class, 'edit'])->name('review_edit');
    Route::patch('/{block}/reviews/{review}', [ReviewController::class, 'update'])->name('review_update');
    Route::delete('/{block}/reviews/{review}', [ReviewController::class, 'destroy'])->name('review_destroy');
  });

  // Management routes
  Route::name('managements.')->prefix('managements')->group(function () {
      Route::get('/', [ManagementController::class, 'index'])->name('index');
      Route::get('/search',  [ManagementController::class, 'search'])->name('search');
      Route::get('/create', [ManagementController::class, 'create'])->name('create');
      Route::post('/store', [ManagementController::class, 'store'])->name('store');
      Route::get('/{management}', [ManagementController::class, 'show'])->name('show');
      Route::get('/{management}/edit', [ManagementController::class, 'edit'])->name('edit');
      Route::patch('/{management}', [ManagementController::class, 'update'])->name('update');
      Route::delete('/{management}', [ManagementController::class, 'destroy'])->name('destroy');
  });

  Route::name('vacancies.')->prefix('vacancies')->group(function () {
      Route::get('/', [VacancyController::class, 'index'])->name('index');
      Route::get('/search', [VacancyController::class, 'search'])->name('search');
      Route::get('/create', [VacancyController::class, 'create'])->name('create');
      Route::post('/store', [VacancyController::class, 'store'])->name('store');
      Route::get('/{vacanci_slug}', [VacancyController::class, 'show'])->name('show');
      Route::get('/{vacanci_slug}/edit', [VacancyController::class, 'edit'])->name('edit');
      Route::patch('/{vacanci_slug}', [VacancyController::class, 'update'])->name('update');
      Route::delete('/{vacanci_slug}', [VacancyController::class, 'destroy'])->name('destroy');
  });

  Route::name('contacts.')->prefix('contacts')->group(function () {
      Route::get('/', [ContactController::class, 'index'])->name('index');
      Route::get('/search', [ContactController::class, 'search'])->name('search');
      Route::get('/create', [ContactController::class, 'create'])->name('create');
      Route::post('/store', [ContactController::class, 'store'])->name('store');
      Route::get('/{contact}', [ContactController::class, 'show'])->name('show');
      Route::get('/{contact}/edit', [ContactController::class, 'edit'])->name('edit');
      Route::patch('/{contact}', [ContactController::class, 'update'])->name('update');
      Route::delete('/{contact}', [ContactController::class, 'destroy'])->name('destroy');
  });

  Route::name('cities.')->prefix('cities')->group(function () {
    Route::get('/', [CityController::class, 'index'])->name('index');
    Route::get('/search',  [CityController::class, 'search'])->name('search');
    Route::get('/create', [CityController::class, 'create'])->name('create');
    Route::post('/store', [CityController::class, 'store'])->name('store');
    Route::get('/{city_slug}', [CityController::class, 'show'])->name('show');
    Route::get('/{city_slug}/edit', [CityController::class, 'edit'])->name('edit');
    Route::patch('/{city_slug}', [CityController::class, 'update'])->name('update');
    Route::delete('/{city_slug}', [CityController::class, 'destroy'])->name('destroy');
  });

  Route::name('statuses.')->prefix('statuses')->group(function () {
    Route::get('/', [StatusController::class, 'index'])->name('index');
    Route::get('/search',  [StatusController::class, 'search'])->name('search');
    Route::get('/create', [StatusController::class, 'create'])->name('create');
    Route::post('/store', [StatusController::class, 'store'])->name('store');
    Route::get('/{status_slug}', [StatusController::class, 'show'])->name('show');
    Route::get('/{status_slug}/edit', [StatusController::class, 'edit'])->name('edit');
    Route::patch('/{status_slug}', [StatusController::class, 'update'])->name('update');
    Route::delete('/{status_slug}', [StatusController::class, 'destroy'])->name('destroy');
  });

  Route::name('projects.')->prefix('projects')->group(function () {
    Route::get('/', [ProjectController::class, 'index'])->name('index');
    Route::get('/search',  [ProjectController::class, 'search'])->name('search');
    Route::get('/create', [ProjectController::class, 'create'])->name('create');
    Route::post('/store', [ProjectController::class, 'store'])->name('store');
    Route::get('/{project_slug}', [ProjectController::class, 'show'])->name('show');
    Route::get('/{project_slug}/edit', [ProjectController::class, 'edit'])->name('edit');
    Route::patch('/{project_slug}', [ProjectController::class, 'update'])->name('update');
    Route::delete('/{project_slug}', [ProjectController::class, 'destroy'])->name('destroy');
    //planning_solutions
    Route::get('/{project_slug}/planning_solutions/create', [PlanningSolutionController::class, 'create'])->name('planning_solution_create');
    Route::post('/{project_slug}/planning_solutions/store', [PlanningSolutionController::class, 'store'])->name('planning_solution_store');
    Route::get('/{project_slug}/planning_solutions/{planning_solution}', [PlanningSolutionController::class, 'show'])->name('planning_solution_show');
    Route::get('/{project_slug}/planning_solutions/{planning_solution}/edit', [PlanningSolutionController::class, 'edit'])->name('planning_solution_edit');
    Route::patch('/{project_slug}/planning_solutions/{planning_solution}', [PlanningSolutionController::class, 'update'])->name('planning_solution_update');
    Route::delete('/{project_slug}/planning_solutions/{planning_solution}', [PlanningSolutionController::class, 'destroy'])->name('planning_solution_destroy');
  });

  Route::name('promotions.')->prefix('promotions')->group(function () {
    Route::get('/', [PromotionController::class, 'index'])->name('index');
    Route::get('/search',  [PromotionController::class, 'search'])->name('search');
    Route::get('/create', [PromotionController::class, 'create'])->name('create');
    Route::post('/store', [PromotionController::class, 'store'])->name('store');
    Route::get('/{promotion_slug}', [PromotionController::class, 'show'])->name('show');
    Route::get('/{promotion_slug}/edit', [PromotionController::class, 'edit'])->name('edit');
    Route::patch('/{promotion_slug}', [PromotionController::class, 'update'])->name('update');
    Route::delete('/{promotion_slug}', [PromotionController::class, 'destroy'])->name('destroy');
  });

  Route::name('news.')->prefix('news')->group(function () {
    Route::get('/', [NewsController::class, 'index'])->name('index');
    Route::get('/search',  [NewsController::class, 'search'])->name('search');
    Route::get('/create', [NewsController::class, 'create'])->name('create');
    Route::post('/store', [NewsController::class, 'store'])->name('store');
    Route::get('/{news_slug}', [NewsController::class, 'show'])->name('show');
    Route::get('/{news_slug}/edit', [NewsController::class, 'edit'])->name('edit');
    Route::patch('/{news_slug}', [NewsController::class, 'update'])->name('update');
    Route::delete('/{news_slug}', [NewsController::class, 'destroy'])->name('destroy');
  });

});
Route::get('/register', function () {
  return redirect('/login');
});
Route::get('/password/reset', function () {
  return redirect('/login');
});

Route::get('/password/reset/{token}', function () {
  return redirect('/login');
});

Route::get('/password/reset/{token}/{email}', function () {
  return redirect('/login');
});

Route::get('/email/verify', function () {
  return redirect('/login');
});
