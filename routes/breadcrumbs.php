<?php

use App\Models\Advantage;
use App\Models\Block;
use App\Models\City;
use App\Models\Company;
use App\Models\Contact;
use App\Models\LifeStroygrad;
use App\Models\Management;
use App\Models\News;
use App\Models\Number;
use App\Models\Page;
use App\Models\PlanningSolution;
use App\Models\Project;
use App\Models\Promotion;
use App\Models\Status;
use App\Models\Vacancy;
use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

// Home
Breadcrumbs::for('home', function (BreadcrumbTrail $trail) {
    $trail->push('Главная', route('home'));
});

Breadcrumbs::for('vacancy', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Вакансии', route('vacancy'));
});

Breadcrumbs::for('about', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('О компании', route('about'));
});

Breadcrumbs::for('contacts', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Контакты', route('contacts'));
});

Breadcrumbs::for('news', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Новости', route('news'));
});

Breadcrumbs::for('news.show', function (BreadcrumbTrail $trail, $news_slug) {
    $trail->parent('news');
    $news = News::whereSlug($news_slug)->firstOrFail();
    $trail->push($news->title, route('news.show', $news_slug));
});

Breadcrumbs::for('promotions', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Акции', route('promotions'));
});

Breadcrumbs::for('promotions.show', function (BreadcrumbTrail $trail, $promotion_slug) {
    $trail->parent('promotions');
    $promotion = Promotion::whereSlug($promotion_slug)->firstOrFail();
    $trail->push($promotion->title, route('promotions.show', $promotion_slug));
});


Breadcrumbs::for('projects', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Проекты', route('projects'));
});

Breadcrumbs::for('project', function (BreadcrumbTrail $trail) {
    $trail->parent('projects');
    $trail->push('Название проекта', route('projects.view', 'asd'));
});


Breadcrumbs::for('team', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Руководство', route('team'));
});

Breadcrumbs::for('admin.index', function (BreadcrumbTrail $trail) {
    $trail->push('Административная панель', route('admin.index'));
});

Breadcrumbs::for('admin.main_info.edit', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.index');
    $trail->push('Редактировать основную информацию', route('admin.main_info.edit'));
});

Breadcrumbs::for('admin.pages.index', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.index');
    $trail->push('Страницы', route('admin.pages.index'));
});

Breadcrumbs::for('admin.pages.show', function (BreadcrumbTrail $trail, $page_slug) {
    $trail->parent('admin.pages.index');
    $page = Page::whereSlug($page_slug)->firstOrFail();
    $trail->push($page->title, route('admin.pages.show', $page_slug));
});

Breadcrumbs::for('admin.pages.edit', function (BreadcrumbTrail $trail, $page_slug) {
    $trail->parent('admin.pages.show', $page_slug);
    $trail->push('Редактирование', route('admin.pages.edit', $page_slug));
});

Breadcrumbs::for('admin.blocks.index', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.index');
    $trail->push('Блоки', route('admin.blocks.index'));
});

Breadcrumbs::for('admin.blocks.show', function (BreadcrumbTrail $trail, $block_slug) {
    $trail->parent('admin.blocks.index');
    $block = Block::whereSlug($block_slug)->firstOrFail();
    $trail->push($block->title, route('admin.blocks.show', $block_slug));
});

Breadcrumbs::for('admin.blocks.edit', function (BreadcrumbTrail $trail, $block_slug) {
    $trail->parent('admin.blocks.show', $block_slug);
    $trail->push('Редактировать блок', route('admin.blocks.edit', $block_slug));
});

Breadcrumbs::for('admin.blocks.number_create', function (BreadcrumbTrail $trail, $block_slug) {
    $trail->parent('admin.blocks.show', $block_slug);
    $trail->push('Создать число', route('admin.blocks.number_create', $block_slug));
});

Breadcrumbs::for('admin.blocks.number_show', function (BreadcrumbTrail $trail, $block_slug, $number) {
    $trail->parent('admin.blocks.show', $block_slug);
    $num = Number::whereId($number)->firstOrFail();
    $trail->push($num->title, route('admin.blocks.number_show', [$block_slug, $number]));
});

Breadcrumbs::for('admin.blocks.number_edit', function (BreadcrumbTrail $trail, $block_slug, $number) {
    $trail->parent('admin.blocks.number_show', $block_slug, $number);
    $trail->push('Редактировать число', route('admin.blocks.number_edit', [$block_slug, $number]));
});

Breadcrumbs::for('admin.blocks.advantage_create', function (BreadcrumbTrail $trail, $block_slug) {
    $trail->parent('admin.blocks.show', $block_slug);
    $trail->push('Создать преимущество', route('admin.blocks.advantage_create', $block_slug));
});

Breadcrumbs::for('admin.blocks.advantage_show', function (BreadcrumbTrail $trail, $block_slug, $advantage) {
    $trail->parent('admin.blocks.show', $block_slug);
    $advantage = Advantage::whereId($advantage)->firstOrFail();
    $trail->push($advantage->title, route('admin.blocks.advantage_show', [$block_slug, $advantage]));
});

Breadcrumbs::for('admin.blocks.advantage_edit', function (BreadcrumbTrail $trail, $block_slug, $advantage) {
    $trail->parent('admin.blocks.advantage_show', $block_slug, $advantage);
    $trail->push('Редактировать преимущество', route('admin.blocks.advantage_edit', [$block_slug, $advantage]));
});

Breadcrumbs::for('admin.blocks.company_create', function (BreadcrumbTrail $trail, $block_slug) {
    $trail->parent('admin.blocks.show', $block_slug);
    $trail->push('Создать компанию', route('admin.blocks.company_create', $block_slug));
});

Breadcrumbs::for('admin.blocks.company_show', function (BreadcrumbTrail $trail, $block_slug, $company) {
    $trail->parent('admin.blocks.show', $block_slug);
    $company = Company::whereId($company)->firstOrFail();
    $trail->push($company->title, route('admin.blocks.company_show', [$block_slug, $company]));
});

Breadcrumbs::for('admin.blocks.company_edit', function (BreadcrumbTrail $trail, $block_slug, $company) {
    $trail->parent('admin.blocks.company_show', $block_slug, $company);
    $trail->push('Редактировать компанию', route('admin.blocks.company_edit', [$block_slug, $company]));
});

Breadcrumbs::for('admin.blocks.life_stroygrad_card_create', function (BreadcrumbTrail $trail, $block_slug) {
    $trail->parent('admin.blocks.show', $block_slug);
    $trail->push('Создать карту Life Stroygrad', route('admin.blocks.life_stroygrad_card_create', $block_slug));
});

Breadcrumbs::for('admin.blocks.life_stroygrad_card_show', function (BreadcrumbTrail $trail, $block_slug, $life_stroygrad_card) {
    $trail->parent('admin.blocks.show', $block_slug);
    $life_stroygrad_card = LifeStroygrad::whereId($life_stroygrad_card)->firstOrFail();
    $trail->push($life_stroygrad_card->title, route('admin.blocks.life_stroygrad_card_show', [$block_slug, $life_stroygrad_card]));
});

Breadcrumbs::for('admin.blocks.life_stroygrad_card_edit', function (BreadcrumbTrail $trail, $block_slug, $life_stroygrad_card) {
    $trail->parent('admin.blocks.life_stroygrad_card_show', $block_slug, $life_stroygrad_card);
    $trail->push('Редактировать карту Life Stroygrad', route('admin.blocks.life_stroygrad_card_edit', [$block_slug, $life_stroygrad_card]));
});

Breadcrumbs::for('admin.blocks.review_create', function (BreadcrumbTrail $trail, $block_slug) {
    $trail->parent('admin.blocks.show', $block_slug);
    $trail->push('Создать отзыв', route('admin.blocks.review_create', $block_slug));
});

Breadcrumbs::for('admin.blocks.review_show', function (BreadcrumbTrail $trail, $block_slug, $review) {
    $trail->parent('admin.blocks.show', $block_slug);
    $review = News::whereId($review)->firstOrFail();
    $trail->push($review->title, route('admin.blocks.review_show', [$block_slug, $review]));
});

Breadcrumbs::for('admin.blocks.review_edit', function (BreadcrumbTrail $trail, $block_slug, $review) {
    $trail->parent('admin.blocks.review_show', $block_slug, $review);
    $trail->push('Редактировать отзыв', route('admin.blocks.review_edit', [$block_slug, $review]));
});


Breadcrumbs::for('admin.managements.index', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.index');
    $trail->push('Руководство', route('admin.managements.index'));
});

Breadcrumbs::for('admin.managements.create', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.managements.index');
    $trail->push('Создать новую запись', route('admin.managements.create'));
});

Breadcrumbs::for('admin.managements.show', function (BreadcrumbTrail $trail, $management) {
    $trail->parent('admin.managements.index');
    $management = Management::whereId($management)->firstOrFail();
    $trail->push($management->title, route('admin.managements.show', $management));
});

Breadcrumbs::for('admin.managements.edit', function (BreadcrumbTrail $trail, $management) {
    $trail->parent('admin.managements.show', $management);
    $trail->push('Редактировать запись', route('admin.managements.edit', $management));
});

Breadcrumbs::for('admin.managements.search', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.managements.index');
    $trail->push('Поиск', route('admin.managements.search'));
});

Breadcrumbs::for('admin.vacancies.index', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.index');
    $trail->push('Вакансии', route('admin.vacancies.index'));
});

Breadcrumbs::for('admin.vacancies.create', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.vacancies.index');
    $trail->push('Создать вакансию', route('admin.vacancies.create'));
});

Breadcrumbs::for('admin.vacancies.show', function (BreadcrumbTrail $trail, $vacanci_slug) {
    $trail->parent('admin.vacancies.index');
    $vacanci = Vacancy::whereSlug($vacanci_slug)->firstOrFail();
    $trail->push($vacanci->title, route('admin.vacancies.show', $vacanci_slug));
});

Breadcrumbs::for('admin.vacancies.edit', function (BreadcrumbTrail $trail, $vacanci_slug) {
    $trail->parent('admin.vacancies.show', $vacanci_slug);
    $trail->push('Редактировать вакансию', route('admin.vacancies.edit', $vacanci_slug));
});

Breadcrumbs::for('admin.vacancies.search', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.vacancies.index');
    $trail->push('Поиск', route('admin.vacancies.search'));
});
Breadcrumbs::for('admin.contacts.index', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.index');
    $trail->push('Контакты', route('admin.contacts.index'));
});

Breadcrumbs::for('admin.contacts.create', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.contacts.index');
    $trail->push('Создать контакт', route('admin.contacts.create'));
});

Breadcrumbs::for('admin.contacts.show', function (BreadcrumbTrail $trail, $contact) {
    $trail->parent('admin.contacts.index');
    $contact = Contact::whereId($contact)->firstOrFail();
    $trail->push($contact->title, route('admin.contacts.show', $contact));
});

Breadcrumbs::for('admin.contacts.edit', function (BreadcrumbTrail $trail, $contact) {
    $trail->parent('admin.contacts.show', $contact);
    $trail->push('Редактировать контакт', route('admin.contacts.edit', $contact));
});

Breadcrumbs::for('admin.contacts.search', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.contacts.index');
    $trail->push('Поиск', route('admin.contacts.search'));
});

Breadcrumbs::for('admin.promotions.index', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.index');
    $trail->push('Акции', route('admin.promotions.index'));
});

Breadcrumbs::for('admin.promotions.create', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.promotions.index');
    $trail->push('Создать акцию', route('admin.promotions.create'));
});

Breadcrumbs::for('admin.promotions.show', function (BreadcrumbTrail $trail, $promotion) {
    $trail->parent('admin.promotions.index');
    $promotion = Promotion::whereSlug($promotion)->firstOrFail();
    $trail->push($promotion->title, route('admin.promotions.show', $promotion));
});

Breadcrumbs::for('admin.promotions.edit', function (BreadcrumbTrail $trail, $promotion) {
    $trail->parent('admin.promotions.show', $promotion);
    $trail->push('Редактировать акцию', route('admin.promotions.edit', $promotion));
});

Breadcrumbs::for('admin.promotions.search', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.promotions.index');
    $trail->push('Поиск', route('admin.promotions.search'));
});

Breadcrumbs::for('admin.news.index', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.index');
    $trail->push('Новости', route('admin.news.index'));
});

Breadcrumbs::for('admin.news.create', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.news.index');
    $trail->push('Создать новость', route('admin.news.create'));
});

Breadcrumbs::for('admin.news.show', function (BreadcrumbTrail $trail, $news) {
    $trail->parent('admin.news.index');
    $news = News::whereSlug($news)->firstOrFail();
    $trail->push($news->title, route('admin.news.show', $news));
});

Breadcrumbs::for('admin.news.edit', function (BreadcrumbTrail $trail, $news) {
    $trail->parent('admin.news.show', $news);
    $trail->push('Редактировать новость', route('admin.news.edit', $news));
});

Breadcrumbs::for('admin.news.search', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.news.index');
    $trail->push('Поиск', route('admin.news.search'));
});

Breadcrumbs::for('admin.cities.index', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.index');
    $trail->push('Города', route('admin.cities.index'));
});

Breadcrumbs::for('admin.cities.create', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.cities.index');
    $trail->push('Создать город', route('admin.cities.create'));
});

Breadcrumbs::for('admin.cities.show', function (BreadcrumbTrail $trail, $city_slug) {
    $trail->parent('admin.cities.index');
    $city = City::whereSlug($city_slug)->firstOrFail();
    $trail->push($city->title, route('admin.cities.show', $city_slug));
});

Breadcrumbs::for('admin.cities.edit', function (BreadcrumbTrail $trail, $city_slug) {
    $trail->parent('admin.cities.show', $city_slug);
    $trail->push('Редактировать город', route('admin.cities.edit', $city_slug));
});
Breadcrumbs::for('admin.cities.search', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.cities.index');
    $trail->push('Поиск', route('admin.cities.search'));
});
Breadcrumbs::for('admin.statuses.index', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.index');
    $trail->push('Статусы', route('admin.statuses.index'));
});

Breadcrumbs::for('admin.statuses.search', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.statuses.index');
    $trail->push('Поиск', route('admin.statuses.search'));
});

Breadcrumbs::for('admin.statuses.create', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.statuses.index');
    $trail->push('Создать статус', route('admin.statuses.create'));
});

Breadcrumbs::for('admin.statuses.show', function (BreadcrumbTrail $trail, $status_slug) {
    $trail->parent('admin.statuses.index');
    $status = Status::whereSlug($status_slug)->firstOrFail();
    $trail->push($status->title, route('admin.statuses.show', $status_slug));
});

Breadcrumbs::for('admin.statuses.edit', function (BreadcrumbTrail $trail, $status_slug) {
    $trail->parent('admin.statuses.show', $status_slug);
    $trail->push('Редактировать статус', route('admin.statuses.edit', $status_slug));
});
Breadcrumbs::for('admin.projects.index', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.index');
    $trail->push('Проекты', route('admin.projects.index'));
});

Breadcrumbs::for('admin.projects.search', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.projects.index');
    $trail->push('Поиск', route('admin.projects.search'));
});

Breadcrumbs::for('admin.projects.create', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.projects.index');
    $trail->push('Создать проект', route('admin.projects.create'));
});

Breadcrumbs::for('admin.projects.show', function (BreadcrumbTrail $trail, $project_slug) {
    $trail->parent('admin.projects.index');
    $project = Project::whereSlug($project_slug)->firstOrFail();
    $trail->push($project->title, route('admin.projects.show', $project_slug));
});

Breadcrumbs::for('admin.projects.edit', function (BreadcrumbTrail $trail, $project_slug) {
    $trail->parent('admin.projects.show', $project_slug);
    $trail->push('Редактировать проект', route('admin.projects.edit', $project_slug));
});

Breadcrumbs::for('admin.projects.planning_solution_create', function (BreadcrumbTrail $trail, $project_slug) {
    $trail->parent('admin.projects.show', $project_slug);
    $trail->push('Создать планировочное решение', route('admin.projects.planning_solution_create', $project_slug));
});

Breadcrumbs::for('admin.projects.planning_solution_show', function (BreadcrumbTrail $trail, $project_slug, $planning_solution) {
    $trail->parent('admin.projects.show', $project_slug);
    $planning_solution = PlanningSolution::where('id', $planning_solution)->firstOrFail();
    $trail->push($planning_solution->number_rooms, route('admin.projects.planning_solution_show', [$project_slug, $planning_solution]));
});

Breadcrumbs::for('admin.projects.planning_solution_edit', function (BreadcrumbTrail $trail, $project_slug, $planning_solution) {
    $trail->parent('admin.projects.planning_solution_show', $project_slug, $planning_solution);
    $trail->push('Редактировать планировочное решение', route('admin.projects.planning_solution_edit', [$project_slug, $planning_solution]));
});


