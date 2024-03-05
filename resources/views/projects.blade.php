@php
    $filters = [
        'status' => ['Готово', 'Не готово'],
        'city' => [],
        'price' => [],
    ];

    $data = [
        [
            'title' => 'Дворянская <br/> усадьба',
            'deadline' => '2023',
            'city' => 'г. Краснодар',
            'description' =>
                'Жилой комплекс в Краснодаре с собственными технопарками, бизнес-центром и научно-образовательным комплексом. Здесь будет все для комфортной жизни — и даже больше. Учитесь, работайте, стройте карьеру в передовых компаниях рядом с домом. ',
            'slug' => 'dom',
            'image' => 'http://127.0.0.1:8000/img/project-1.jpg',
            'comfort' => ['4 детские площадки', '2 детских сада', '563 парковкочных места', 'зона барбекю'],
            'flats' => [
                [
                    'type' => '1-комнатные',
                    'square' => 'от 19.2м²',
                    'slug' => '/dom',
                    'price' => 'от 5,9 млн ₽',
                ],
                [
                    'type' => '2-комнатные',
                    'square' => 'от 19.2м²',
                    'slug' => '/dom',
                    'price' => 'от 8,9 млн ₽',
                ],
                [
                    'type' => '3-комнатные',
                    'square' => 'от 19.2м²',
                    'slug' => '/dom',
                    'price' => 'от 8,9 млн ₽',
                ],
                [
                    'type' => '4-комнатные',
                    'square' => 'от 19.2м²',
                    'slug' => '/dom',
                    'price' => 'от 15,9 млн ₽',
                ],
            ],
        ],
        [
            'title' => 'Не Дворянская <br/> усадьба',
            'deadline' => '2054',
            'city' => 'г. Краснодар',
            'description' =>
                'Жилой комплекс в Краснодаре с собственными технопарками, бизнес-центром и научно-образовательным комплексом. Здесь будет все для комфортной жизни — и даже больше. Учитесь, работайте, стройте карьеру в передовых компаниях рядом с домом. ',
            'slug' => 'dom',
            'image' => 'http://127.0.0.1:8000/img/project-2.jpg',
            'comfort' => ['4 детские площадки', '2 детских сада', '563 парковкочных места', 'зона барбекю'],
            'flats' => [
                [
                    'type' => '1-комнатные',
                    'square' => 'от 19.2м²',
                    'slug' => '/dom',
                    'price' => 'от 5,9 млн ₽',
                ],
                [
                    'type' => '2-комнатные',
                    'square' => 'от 19.2м²',
                    'slug' => '/dom',
                    'price' => 'от 8,9 млн ₽',
                ],
                [
                    'type' => '3-комнатные',
                    'square' => 'от 19.2м²',
                    'slug' => '/dom',
                    'price' => 'от 8,9 млн ₽',
                ],
                [
                    'type' => '4-комнатные',
                    'square' => 'от 19.2м²',
                    'slug' => '/dom',
                    'price' => 'от 15,9 млн ₽',
                ],
            ],
        ],
        [
            'title' => 'Дворянская <br/> усадьба',
            'deadline' => '2054',
            'city' => 'г. Краснодар',
            'description' =>
                'Жилой комплекс в Краснодаре с собственными технопарками, бизнес-центром и научно-образовательным комплексом. Здесь будет все для комфортной жизни — и даже больше. Учитесь, работайте, стройте карьеру в передовых компаниях рядом с домом. ',
            'slug' => 'dom',
            'image' => 'http://127.0.0.1:8000/img/project-3.jpg',
            'comfort' => ['4 детские площадки', '2 детских сада', '563 парковкочных места', 'зона барбекю'],
            'flats' => [
                [
                    'type' => '1-комнатные',
                    'square' => 'от 19.2м²',
                    'slug' => '/dom',
                    'price' => 'от 5,9 млн ₽',
                ],
                [
                    'type' => '2-комнатные',
                    'square' => 'от 19.2м²',
                    'slug' => '/dom',
                    'price' => 'от 8,9 млн ₽',
                ],
                [
                    'type' => '3-комнатные',
                    'square' => 'от 19.2м²',
                    'slug' => '/dom',
                    'price' => 'от 8,9 млн ₽',
                ],
                [
                    'type' => '4-комнатные',
                    'square' => 'от 19.2м²',
                    'slug' => '/dom',
                    'price' => 'от 15,9 млн ₽',
                ],
            ],
        ],
    ];
@endphp

@extends('layouts.main')

@section('content')
    <main class="projects-page" data-barba="container" data-barba-namespace="peojects">
      {{ Breadcrumbs::render('projects') }}
        <section class="projects-page-hero">
            <div class="container">
                <h1 class="projects-page-title">Наши <br> проекты</h1>
            </div>
        </section>


        <section class="projects-page-catalog">
            <div class="container">
                <div class="projects-page-catalog__filter">
                    <div class="projects-page-catalog__filter_wrap">
                        <p>1</p>
                        <p>1</p>
                        <p>1</p>
                    </div>
                    <p class="projects-page-catalog__filter_count">Найдено проектов: 15</p>
                </div>

                {{-- Big Card Start --}}
                <div class="projects-page-catalog__big_card">
                    <div class="projects-page-catalog__big_card_image">
                        <img src="{{ asset('img/projects-page-1.jpg') }}" alt="Дворянская усадьба">
                    </div>

                    <div class="projects-page-catalog__big_card_info">
                        <h4 class="projects-page-catalog__big_card_title">Дворянская <br> усадьба</h4>
                        <div class="projects-page-catalog__big_card_col">
                            <p class="projects-page-catalog__big_card_col_city">г. Краснодар</p>
                            <p class="projects-page-catalog__big_card_col_deadline">Год сдачи 2023</p>
                        </div>
                        <p class="projects-page-catalog__big_card_text">
                            Жилой комплекс в Краснодаре с собственными технопарками, бизнес-центром и научно-образовательным
                            комплексом. Здесь будет все для комфортной жизни — и даже больше. Учитесь, работайте, стройте
                            карьеру в передовых компаниях рядом с домом.
                        </p>
                        <p class="projects-page-catalog__big_card_link">
                            <x-ui.link href="/">от 3,3 млн. руб.</x-ui.link>
                        </p>
                    </div>
                </div>
                {{-- Big Card End --}}

            </div>

            <div class="projects-page-list">
                @foreach ($data as $item)
                    <x-project_item :title="$item['title']" :deadline="$item['deadline']" :city="$item['city']" :description="$item['description']"
                        :slug="$item['slug']" :image="$item['image']" :comfort="$item['comfort']" :flats="$item['flats']" />
                @endforeach
            </div>
            <div class="hr --last" ></div>
        </section>


        <section class="spacer"></section>
    </main>
@endsection
