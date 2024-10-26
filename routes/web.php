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
use App\Http\Controllers\Front\WelcomePageController;
use App\Http\Controllers\Front\AboutPageController;
use App\Http\Controllers\Front\ContactPageController;
use App\Http\Controllers\Front\NewsPageController;
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

Route::get('/projects', function () {
  return view('projects');
})->name('projects');

Route::get('/projects/{slug}', function () {
  return view('project');
})->name('projects.view');


Route::get('/news',  [NewsPageController::class, 'index'])->name('news');
Route::get('/news/{news_slug}', [NewsPageController::class, 'show'])->name('news.show');
Route::post('/news/load-more', [NewsPageController::class, 'loadMore'])->name('news.loadMore');

Route::get('/promotions',  [PromotionPageController::class, 'index'])->name('promotions');
Route::get('/promotions/{promotion_slug}', [PromotionPageController::class, 'show'])->name('promotion.show');
Route::post('/promotions/load-more', [PromotionPageController::class, 'loadMore'])->name('promotions.loadMore');


Route::get('/team', [TeamPageController::class, 'index'])->name('team');

Route::get('/vacancy',  [VacancyPageController::class, 'index'])->name('vacancy');
Route::get('/vacancy/{citySlug}', [VacancyPageController::class, 'filterByCity'])->name('vacancy.filterByCity');

Route::get('/contacts',  [ContactPageController::class, 'index'])->name('contacts');







Route::middleware('auth')->name('admin.')->prefix('admin')->group(function () {

  Route::get('/', [MainController::class, 'index'])->name('index');
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
    //project_blocks
    Route::get('/{project_slug}/project_blocks/{project_block_slug}', [ProjectBlockController::class, 'show'])->name('project_block_show');
    Route::get('/{project_slug}/project_blocks/{project_block_slug}/edit', [ProjectBlockController::class, 'edit'])->name('project_block_edit');
    Route::patch('/{project_slug}/project_blocks/{project_block_slug}', [ProjectBlockController::class, 'update'])->name('project_block_update');
    //planning_solutions
    Route::get('/{project_slug}/project_blocks/{project_block}/planning_solutions/create', [PlanningSolutionController::class, 'create'])->name('planning_solution_create');
    Route::post('/{project_slug}/project_blocks/{project_block}/planning_solutions/store', [PlanningSolutionController::class, 'store'])->name('planning_solution_store');
    Route::get('/{project_slug}/project_blocks/{project_block}/planning_solutions/{planning_solution}', [PlanningSolutionController::class, 'show'])->name('planning_solution_show');
    Route::get('/{project_slug}/project_blocks/{project_block}/planning_solutions/{planning_solution}/edit', [PlanningSolutionController::class, 'edit'])->name('planning_solution_edit');
    Route::patch('/{project_slug}/project_blocks/{project_block}/planning_solutions/{planning_solution}', [PlanningSolutionController::class, 'update'])->name('planning_solution_update');
    Route::delete('/{project_slug}/project_blocks/{project_block}/planning_solutions/{planning_solution}', [PlanningSolutionController::class, 'destroy'])->name('planning_solution_destroy');
    //facilities
    Route::get('/{project_slug}/project_blocks/{project_block}/facilities/create', [FacilitieController::class, 'create'])->name('facilitie_create');
    Route::post('/{project_slug}/project_blocks/{project_block}/facilities/store', [FacilitieController::class, 'store'])->name('facilitie_store');
    Route::get('/{project_slug}/project_blocks/{project_block}/facilities/{facilitie}', [FacilitieController::class, 'show'])->name('facilitie_show');
    Route::get('/{project_slug}/project_blocks/{project_block}/facilities/{facilitie}/edit', [FacilitieController::class, 'edit'])->name('facilitie_edit');
    Route::patch('/{project_slug}/project_blocks/{project_block}/facilities/{facilitie}', [FacilitieController::class, 'update'])->name('facilitie_update');
    Route::delete('/{project_slug}/project_blocks/{project_block}/facilities/{facilitie}', [FacilitieController::class, 'destroy'])->name('facilitie_destroy');
    //map_points
    Route::get('/{project_slug}/project_blocks/{project_block}/map_points/create', [MapPointController::class, 'create'])->name('map_point_create');
    Route::post('/{project_slug}/project_blocks/{project_block}/map_points/store', [MapPointController::class, 'store'])->name('map_point_store');
    Route::get('/{project_slug}/project_blocks/{project_block}/map_points/{map_point}', [MapPointController::class, 'show'])->name('map_point_show');
    Route::get('/{project_slug}/project_blocks/{project_block}/map_points/{map_point}/edit', [MapPointController::class, 'edit'])->name('map_point_edit');
    Route::patch('/{project_slug}/project_blocks/{project_block}/map_points/{map_point}', [MapPointController::class, 'update'])->name('map_point_update');
    Route::delete('/{project_slug}/project_blocks/{project_block}/map_points/{map_point}', [MapPointController::class, 'destroy'])->name('map_point_destroy');
    //project_images
    Route::get('/{project_slug}/project_blocks/{project_block}/project_images/create', [ProjectImageController::class, 'create'])->name('project_image_create');
    Route::post('/{project_slug}/project_blocks/{project_block}/project_images/store', [ProjectImageController::class, 'store'])->name('project_image_store');
    Route::get('/{project_slug}/project_blocks/{project_block}/project_images/{project_image}', [ProjectImageController::class, 'show'])->name('project_image_show');
    Route::get('/{project_slug}/project_blocks/{project_block}/project_images/{project_image}/edit', [ProjectImageController::class, 'edit'])->name('project_image_edit');
    Route::patch('/{project_slug}/project_blocks/{project_block}/project_images/{project_image}', [ProjectImageController::class, 'update'])->name('project_image_update');
    Route::delete('/{project_slug}/project_blocks/{project_block}/project_images/{project_image}', [ProjectImageController::class, 'destroy'])->name('project_image_destroy');
    //construction_stages
    Route::get('/{project_slug}/project_blocks/{project_block}/construction_stages/create', [ConstructionStageController::class, 'create'])->name('construction_stage_create');
    Route::post('/{project_slug}/project_blocks/{project_block}/construction_stages/store', [ConstructionStageController::class, 'store'])->name('construction_stage_store');
    Route::get('/{project_slug}/project_blocks/{project_block}/construction_stages/{construction_stage}', [ConstructionStageController::class, 'show'])->name('construction_stage_show');
    Route::get('/{project_slug}/project_blocks/{project_block}/construction_stages/{construction_stage}/edit', [ConstructionStageController::class, 'edit'])->name('construction_stage_edit');
    Route::patch('/{project_slug}/project_blocks/{project_block}/construction_stages/{construction_stage}', [ConstructionStageController::class, 'update'])->name('construction_stage_update');
    Route::delete('/{project_slug}/project_blocks/{project_block}/construction_stages/{construction_stage}', [ConstructionStageController::class, 'destroy'])->name('construction_stage_destroy');
    //documents
    Route::get('/{project_slug}/project_blocks/{project_block}/documents/create', [DocumentController::class, 'create'])->name('document_create');
    Route::post('/{project_slug}/project_blocks/{project_block}/documents/store', [DocumentController::class, 'store'])->name('document_store');
    Route::get('/{project_slug}/project_blocks/{project_block}/documents/{document}', [DocumentController::class, 'show'])->name('document_show');
    Route::get('/{project_slug}/project_blocks/{project_block}/documents/{document}/edit', [DocumentController::class, 'edit'])->name('document_edit');
    Route::patch('/{project_slug}/project_blocks/{project_block}/documents/{document}', [DocumentController::class, 'update'])->name('document_update');
    Route::delete('/{project_slug}/project_blocks/{project_block}/documents/{document}', [DocumentController::class, 'destroy'])->name('document_destroy');
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
