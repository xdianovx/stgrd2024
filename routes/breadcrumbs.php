<?php

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

Breadcrumbs::for('newssingle', function (BreadcrumbTrail $trail) {
    $trail->parent('news');
    $trail->push('Название новости', route('news.view', 'asd'));
});

Breadcrumbs::for('stock', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Акции', route('stock'));
});

Breadcrumbs::for('stocksingle', function (BreadcrumbTrail $trail) {
    $trail->parent('stock');
    $trail->push('Название акции', route('news.view', 'asd'));
});


Breadcrumbs::for('projects', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Проекты', route('projects'));
});

Breadcrumbs::for('team', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Руководство', route('team'));
});

// Home > Blog
//Breadcrumbs::for('blog', function (BreadcrumbTrail $trail) {
//    $trail->parent('home');
//    $trail->push('Blog', route('blog'));
//});
//
//// Home > Blog > [Category]
//Breadcrumbs::for('category', function (BreadcrumbTrail $trail, $category) {
//    $trail->parent('blog');
//    $trail->push($category->title, route('category', $category));
//});
